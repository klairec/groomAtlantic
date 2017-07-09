<?php

namespace Model;


/**
	UsersModel => table users
	ShopModel => table shop
	MyShopModel => table my_shop
*/
class ServicesInfosModel extends \W\Model\Model
{


	public function findSkillsWithId($id)
	{

		$sql = 'SELECT skills FROM ' . $this->table . ' , groom_services  WHERE id_groom  = :id AND FIND_IN_SET(groom_services.id, id_skill) ';

		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id);
		$sth->execute();

		return $sth->fetchAll();
	}


		/**
	 * Effectue une recherche
	 * @param array $data Un tableau associatif des valeurs à rechercher
	 * @param string $operator La direction du tri, AND ou OR
	 * @param boolean $stripTags Active le strip_tags automatique sur toutes les valeurs
	 * @return mixed false si erreur, le résultat de la recherche sinon
	 */
	public function searchByCP($search){

		
		
		// TENTATIVE D'INCLURE LE FIND IN SET DANS LA RECHERHE  : $sql = 'SELECT s.*, u.*, g.* FROM groom_services AS g, ' . $this->table.' AS s INNER JOIN users AS u ON s.id_groom = u.id WHERE s.city LIKE :city AND FIND_IN_SET(g.id, id_skill) ';


        $sql = 'SELECT s.*, u.* FROM ' . $this->table.' AS s INNER JOIN users AS u ON s.id_groom = u.id WHERE s.work_area LIKE :city';               
		
		$sth = $this->dbh->prepare($sql);	
			
		$sth->bindValue(':city', '%'.$search.'%');
	
		if(!$sth->execute()){
			return false;
		}
        return $sth->fetchAll();
	}
		


}


