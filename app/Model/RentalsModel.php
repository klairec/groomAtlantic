<?php

namespace Model;

class RentalsModel extends \W\Model\Model
{
	public function findRentalsWithId(){
		// Selectionne tous les champs de la table Rentals et l'ID du connecté
		$sql = 'SELECT r.*, u.id FROM '.$this->table.' AS r INNER JOIN users AS u ON r.id_owner = u.id ORDER BY r.name ASC ';

		$select = $this->dbh->prepare($sql);
		if($select->execute()){
			return $select->fetchAll(); // Renvoi les résultats
		}

		return false;
	}
}
