<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\CommentsModel;


class CommentsController extends Controller
{


    public function commentList(){

        $commentsModel = new Model();

        $comments = $commentsModel->findAll();



        $params = [
            'comments' => $comments,
        ];


        $this->show('users/groomProfile/showGroom', $params);

    }
    
    