<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\Contact_requestsModel;


class Contact_requestsController extends Controller
{

    public function ContactAuthor(){
        $ContactAuthor = new Contact_requestsModel();
        $contactAut = $ContactAuthor->contactAuthorName();
        
        return $contactAut;
    }
}
    