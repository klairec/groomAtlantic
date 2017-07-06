<?php

namespace Model;

/**
 * Classe requise par l'AuthentificationModel, éventuellement à étendre par le UsersModel de l'appli
 */
class CommentsModel extends \W\Model\Model
{
    // Récupération des commentaires pour l'espace concierge
    public function showCommentById(){

        $sql = 'SELECT c.*, u.* FROM '.$this->table.' AS c INNER JOIN users AS u ON c.id_groom = u.id ORDER BY date DESC';
        $select = $this->dbh->prepare($sql);
		if($select->execute()){
			return $select->fetchAll(); // Renvoie les résultats
		}
		return false;
    }

    // Récupération des commentaires pour l'espace propriétaire
    public function showCommentsById(){

        $sql = 'SELECT c.*, u.* FROM '.$this->table.' AS c INNER JOIN users AS u ON c.id_owner = u.id ORDER BY date DESC';
        $select = $this->dbh->prepare($sql);
        if($select->execute()){
            return $select->fetchAll(); // Renvoie les résultats
        }
        return false;
    }
    
    
    // Récupération de l'auteur du commentaire (propriétaire)
    public function commentsAuthorName(){

        $sql = 'SELECT c.*, u.firstname, u.id FROM '.$this->table.' AS c INNER JOIN users AS u ON c.id_owner = u.id';
        $select = $this->dbh->prepare($sql);
		if($select->execute()){
			return $select->fetchAll(); // Renvoie les résultats
		}
		return false;
    }

    // Récupération du destinataire du commentaire (groom)
    public function commentsAddresseeName(){

        $sql = 'SELECT c.*, u.firstname, u.id FROM '.$this->table.' AS c INNER JOIN users AS u ON c.id_groom = u.id';
        $select = $this->dbh->prepare($sql);
        if($select->execute()){
            return $select->fetchAll(); // Renvoie les résultats
        }
        return false;
    }
}

