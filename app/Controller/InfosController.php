<?php

namespace Controller;

use \W\Controller\Controller;



class InfosController extends Controller
{
    public function infosPratiques(){

        $this->show('infos/infosPratiques');

    }

    public function CharteQualite(){
    	$this->show('infos/charteQualite');
    }

   

	
}

	

