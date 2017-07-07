<?php

namespace Model;

class RentalsModel extends \W\Model\Model
{

	/**
	 * Récupère une ligne de la table Rentals en fonction d'un identifiant 'users' connecté
	 * @param  integer Identifiant
	 * @return mixed Les données sous forme de tableau associatif
	 */
	public function findRentalsWithId($id_user){
		// Selectionne tous les champs de la table Rentals et l'ID du connecté
		$sql = 'SELECT r.*, u.id FROM '.$this->table.' AS r INNER JOIN users AS u ON r.id_owner = u.id ORDER BY r.title ASC';

		$select = $this->dbh->prepare($sql);
		if($select->execute()){
			return $select->fetchAll(); // Renvoi les résultats
		}

		return false;
	}
}
