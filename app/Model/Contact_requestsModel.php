<?php

namespace Model;

/**
 * Classe requise par l'AuthentificationModel, éventuellement à étendre par le UsersModel de l'appli
 */
class Contact_requestsModel extends \W\Model\Model
{
    // Récupération des commentaires
    public function contactAuthorName(){

        $sql = 'SELECT c.*, u.* FROM '.$this->table.' AS c INNER JOIN users AS u ON c.id_owner = u.id';
        $select = $this->dbh->prepare($sql);
		if($select->execute()){
			return $select->fetchAll(); // Renvoie les résultats
		}
		return false;
    }
    
}

