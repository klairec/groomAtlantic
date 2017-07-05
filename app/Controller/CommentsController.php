<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\CommentsModel;


class CommentsController extends Controller
{


    public function commentList(){

        $commentsModel = new CommentsModel();
        $comments = $commentsModel->showCommentById();
        
        $params = [
            'comments' => $comments,
        ];

        $this->show('users/groomProfile/showGroom', $params);
    }
    
    