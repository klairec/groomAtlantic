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
    
    public function commentList(){
    $comments = new CommentsController();
    $comments = $CommentsController->showCommentById();
    
    $params = [
            'comments' => $comments,
        ];
        
    $this->show('url', $params); 
    }
    */