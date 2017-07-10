<?php

namespace Model;

/**
 * Classe requise par l'AuthentificationModel, éventuellement à étendre par le UsersModel de l'appli
 */
class UsersModel extends \W\Model\UsersModel
{
    
    public function nameUser($id)
    {
        $sql = 'SELECT firstname, lastname FROM users WHERE id = :id LIMIT 1';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id', $id);
        $sth->execute();
                
        return $sth->fetch();
    }

    public function mapMarkers()
    {
        $sql = 'SELECT * FROM users WHERE role = "groom"'; 
        $result = $this->dbh->prepare($sql);
        if($result->execute())
        {
            $donnee = $result->fetchAll();
            return $donnee;
        }
    }
    
    public function getXmlCoordsFromAdress($address)
    {
        $coords=array();
        $base_url="http://maps.googleapis.com/maps/api/geocode/xml?";
        // ajouter &region=FR si ambiguité (lieu de la requete pris par défaut)
        $request_url = $base_url . "address=" . urlencode($address).'&sensor=false';
        $xml = simplexml_load_file($request_url) or die("url not loading");
        //print_r($xml);
        $coords['lat']=$coords['lon']='';
        $coords['status'] = $xml->status ;
        if($coords['status']=='OK')
        {
            $coords['lat'] = $xml->result->geometry->location->lat ;
            $coords['lon'] = $xml->result->geometry->location->lng ;
        }
        return $coords;
    }

    //$coords=getXmlCoordsFromAdress();
  
}