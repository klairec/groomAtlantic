<?php

namespace Model;

/**
 * Classe requise par l'AuthentificationModel, éventuellement à étendre par le UsersModel de l'appli
 */
class ContactRequestsModel extends \W\Model\Model
{
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
        $sth->bindValue(':id_groom', $idOwner);
        $sth->bindValue(':id_owner', $idGroom);
        $sth->execute();

		return $sth->fetchAll();
        
		
    }

    
}

