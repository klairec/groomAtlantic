<?php

namespace Controller;

use \W\Controller\Controller;

class Groom_servicesController extends Controller
{
    public function showServices(){
        $GroomServModel = new Groom_servicesModel();
        $groomservices = $GroomServModel->findGroom_servicesWithId();

        $params = [
            'groomskills' => $groomservices,
        ];


        $this->show('users/Profile/showService', $params);
    }
}