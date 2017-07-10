<?php

namespace Model;


/**
	UsersModel => table users
	ShopModel => table shop
	MyShopModel => table my_shop
*/
class ServicesInfosModel extends \W\Model\Model
{

	public function findSkillsWithId($id) // Fonction qui récup les compétences du groom en FIND_IN_8SET
	{

		$sql = '
		SELECT skills 
		FROM ' . $this->table . ' , groom_services  
		WHERE id_groom  = :id 
		AND FIND_IN_SET(groom_services.id, id_skill) ';

		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id);
		$sth->execute();

		return $sth->fetchAll();
	}

	// Fonction qui récup les prix renseignés par le groom
	public function findPricesWithId($id) 
	{

		$sql = 'SELECT * FROM ' . $this->table . ' WHERE id_groom  = :id';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id);
		$sth->execute();

		return $sth->fetchAll();
	}

	public function searchByCP($search){ // Fonction qui recherche le groom en fonction du CP rentré, jointé avec les infos de users

		
		
		// TENTATIVE D'INCLURE LE FIND IN SET DANS LA RECHERHE  : $sql = 'SELECT s.*, u.*, g.* FROM groom_services AS g, ' . $this->table.' AS s INNER JOIN users AS u ON s.id_groom = u.id WHERE s.city LIKE :city AND FIND_IN_SET(g.id, id_skill) ';


        $sql = '
        SELECT s.*, u.* 
        FROM ' . $this->table.' AS s 
        INNER JOIN users AS u 
        ON s.id_groom = u.id 
        WHERE s.work_area 
        LIKE :city';               
		
		$sth = $this->dbh->prepare($sql);	
			
		$sth->bindValue(':city', '%'.$search.'%');
	
		if(!$sth->execute()){
			return false;
		}
        return $sth->fetchAll();
	}


	public function groomById($id){ // Fonction qui recherche le groom en fonction du CP rentré, jointé avec les infos de users

		
		
		// TENTATIVE D'INCLURE LE FIND IN SET DANS LA RECHERHE  : $sql = 'SELECT s.*, u.*, g.* FROM groom_services AS g, ' . $this->table.' AS s INNER JOIN users AS u ON s.id_groom = u.id WHERE s.city LIKE :city AND FIND_IN_SET(g.id, id_skill) ';


        $sql = '
        SELECT s.*, u.* 
        FROM ' . $this->table.' AS s 
        INNER JOIN users AS u 
        ON s.id_groom = u.id 
        WHERE s.id_groom = :id_groom';               
		
		$sth = $this->dbh->prepare($sql);	
			
		$sth->bindValue(':id_groom', $id);
	
		if(!$sth->execute()){
			return false;
		}
        return $sth->fetchAll();
	}
}


