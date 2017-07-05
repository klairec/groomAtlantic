<?php

namespace Model;

class Reset_passwordModel extends \W\Model\Model
{
    	public function findToken($idUser, $token)
	{
		

		$sql = 'SELECT * FROM ' . $this->table . ' WHERE id_user = :idUser AND token = :token';
		$sth = $this->dbh->prepare($sql);		
		$sth->bindValue(':idUser', $idUser);
		$sth->bindValue(':token', $token);

		$sth->execute();

		return $sth->fetchall();
	}
}



