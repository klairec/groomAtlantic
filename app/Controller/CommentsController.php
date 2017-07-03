<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\CommentsModel;


class CommentsController extends Controller
{


    public function commentList(){

        $commentsModel = new Model();

        $ListComments = $commentsModel->findAll();



        $params = [
            'ListComments' => $ListComments,


        ];


        $this->show('users/Profile/showProfile', $params);

    }