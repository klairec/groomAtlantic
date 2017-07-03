<?php

namespace Controller;

use \W\Controller\Controller;

class Groom_servicesController extends Controller
{

    $GroomServModel = new Groom_servicesModel();
    $groomskills = $GroomServModel->findGroom_servicesWithId();
    
    $params = [
				'groomskills' => $groomskills,
			];


			$this->show('users/Profile/showProfile', $params);

}