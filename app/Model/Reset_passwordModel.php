<?php

namespace Model;

class Reset_passwordModel extends \W\Model\Model
{
    	public function findIdByEmail($email)
	{
	

		$sql = 'SELECT id FROM users WHERE email = :email';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':email', $email);
		$sth->execute();

		return $sth->fetch();
	}
}



