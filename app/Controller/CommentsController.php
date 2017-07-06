<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\CommentsModel;


class CommentsController extends Controller
{


    public function commentList(){

        $commentsModel = new CommentsModel();
        $comments= $commentsModel->showCommentById();

        return $comments;
    }
    
    public function commentsAuthor(){
        $commentsAuthor = new CommentsModel();
        $commentsAut = $commentsAuthor->commentsAuthorName();
        
        return $commentsAut;
    }
}
    
  