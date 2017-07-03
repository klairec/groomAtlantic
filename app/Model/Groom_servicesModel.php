<?php

namespace Model;

class Groom_servicesModel extends \W\Model\Model
{
	public function findGroom_servicesWithId(){
		// Selectionne tous les champs de la table Groom_services et l'ID du connecté
		$sql = 'SELECT g.*, u.id FROM '.$this->table.' AS g INNER JOIN users AS u ON g.id_groom = u.id';

		$select = $this->dbh->prepare($sql);
		if($select->execute()){
			return $select->fetchAll(); // Renvoie les résultats
		}

		return false;
	}
}
