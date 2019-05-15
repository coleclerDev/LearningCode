<?php 

use \Billets\Model\PostManager;
use \Billets\Model\CommentManager;

require_once('model/PostManager.php');
require_once('model/CommentManager.php');


function listPosts() {

	$postManager = new PostManager();
	$posts = $postManager->getPosts();

	require('view/listPostsView.php');
}


//Affiche un billet
function post() {
	
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);

    if ($post['billetId'] != '') {
    	$comments = $commentManager->getComments($_GET['id']);
    	 require('view/postView.php');
    } else {
		throw new Exception('Page not found !');
    }   
}

	
function addPost(String $title, String $content) {
	
	$postManager = new PostManager();

	$postManager->postPost($title, $content);

	header('Location: index.php?action=listPosts');
}


//Envoi au formulaire pour creer un billet
function getFormPost() {
	require('view/create_post.php');
}


function addComment(int $postId, String $author, String $comment) {

	$commentManager = new CommentManager();

	$affectedlines = $commentManager->postComment($postId, $author, $comment);

	if ($affectedlines === false) {
		throw new Exception('Impossible d\'ajouter le commentaire !');
	} else {
		header('Location: index.php?action=post&id=' . $postId);
	}
}


function modifyComment(int $commentId, String $author, String $comment) {

	$commentManager = new CommentManager();

	$affectedline = $commentManager->updateComment($commentId, $author, $comment);
	$postId = $commentManager->getPostId($commentId);

	if ($affectedline != 1) {
		throw new Exception('Impossible de modifier le commentaire !' . $affectedline);
	} else {
		header('Location: index.php?action=post&id='.$postId);
	}
}


//Retourne le formulaire pour MODIFIER le commentaire
function getFormComment(int $commentId) {
	
	$commentManager = new CommentManager();

	$comment = $commentManager->getComment($commentId);

	require('view/modifyCommentView.php');
}