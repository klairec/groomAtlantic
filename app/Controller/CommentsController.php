<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\CommentsModel;


class CommentsController extends Controller
{


    public function commentList(){

        $commentsModel = new Model();

        $comment = $commentsModel->findAll();



        $params = [
            'comment' => $comment,
        ];


        $this->show('users/groomProfile/showGroom', $params);

    }
    
    