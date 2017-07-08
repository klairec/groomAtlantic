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
	public function search2(array $search, $operator = 'OR', $stripTags = true){

		// Sécurisation de l'opérateur
		$operator = strtoupper($operator);
		if($operator != 'OR' && $operator != 'AND'){
			die('Error: invalid operator param');
		}

        $sql = 'SELECT * FROM ' . $this->table.' , groom_services WHERE';
                
		foreach($search as $key => $value){
			$sql .= " `$key` LIKE :$key ";
			$sql .= $operator;
		}
		
		// Supprime les caractères superflus en fin de requète
		if($operator == 'OR') {
			$sql = substr($sql, 0, -3);
		}
		elseif($operator == 'AND') {
			$sql = substr($sql, 0, -4);
		}

		$sth = $this->dbh->prepare($sql);

		foreach($search as $key => $value){
			$value = ($stripTags) ? strip_tags($value) : $value;
			$sth->bindValue(':'.$key, '%'.$value.'%');
		}
		if(!$sth->execute()){
			return false;
		}
        return $sth->fetchAll();
	}
		


}


