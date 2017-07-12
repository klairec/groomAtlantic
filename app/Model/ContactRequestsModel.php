<?php

namespace Model;

/**
 * Classe requise par l'AuthentificationModel, éventuellement à étendre par le UsersModel de l'appli
 */
class ContactRequestsModel extends \W\Model\Model
{

    /**
     * Contiendra le nombre de notifications non "lues"
     */
    public $totalNotifications = 0;

    // Récupération des commentaires
    public function contactAuthorName(){

        $sql = '

        SELECT c.*, u.* 
        FROM '.$this->table.' 
        AS c 
        INNER JOIN users 
        AS u 
        ON c.id_owner = u.id';

        $select = $this->dbh->prepare($sql);
        if($select->execute()){
            return $select->fetchAll(); // Renvoie les résultats
        }
        return false;
    }

    public function requestDoublon($idOwner, $idGroom){ //select les requetes qui concernnent le groom // On la compare ensuite à celui qui fait la requete (id_owner) pour vérifier s'il ne contacte pas 2 fois la même personne

        $sql = '

        SELECT * 
        FROM '.$this->table.' 
        WHERE id_groom = :id_groom 
        AND id_owner = :id_owner';
        $sth = $this->dbh->prepare($sql);
        // @todo : ordre des variables ?
        $sth->bindValue(':id_groom', $idGroom);
        $sth->bindValue(':id_owner', $idOwner);
        $sth->execute();

        return $sth->fetchAll();
        
    }


    public function showRequestForGroomId($id_groom)
    {

        $sql = 'SELECT SQL_CALC_FOUND_ROWS c.id AS contact_id, c.groom_accept, c.owner_confirm, c.groom_confirm, c.date AS contact_date, c.rent_id, groom.firstname AS groom_firstname, groom.lastname AS groom_lastname, owner.firstname AS owner_firstname, owner.lastname AS owner_lastname, r.title AS rent_title, r.postcode, r.city

            FROM '.$this->table.' AS c 
            JOIN users AS groom ON c.id_groom = groom.id 
            JOIN users AS owner ON c.id_owner = owner.id 
            JOIN rentals AS r ON c.rent_id = r.id';

        $sql.= ' WHERE c.id_groom = :id_groom AND c.groom_accept = 0';

        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id_groom', $id_groom, \PDO::PARAM_INT);
        $sth->execute();

        $this->countResult();

        return $sth->fetchAll();
    }



    public function recalcNotif($id_groom)
    {
        $sql = 'SELECT SQL_CALC_FOUND_ROWS id FROM '.$this->table .' WHERE id_groom = :id_groom AND groom_accept = 0';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id_groom', $id_groom, \PDO::PARAM_INT);
        $sth->execute();

        $this->countResult();
    }
    protected function countResult(){
        $sql = 'SELECT FOUND_ROWS() AS nb_result';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();

        $result = $sth->fetch();

        $this->totalNotifications = $result['nb_result'];
    }

    
}

