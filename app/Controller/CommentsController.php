<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\CommentsModel;


class CommentsController extends Controller
{


    public function commentList(){

        $commentsModel = new CommentsModel();
        $comments = $commentsModel->showCommentById();

        return $comments ;
    }
    
    
    /* AJOUTER DANS UsersController
    $comments = new CommentsController();
    $comments = $commentsController->showCommentById();
    
    $params = [
            'comments' => $comments,
        ];

        return $comments ;
        
    $this->show('url', $params); 
    */