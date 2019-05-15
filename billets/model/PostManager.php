<?php

namespace Billets\Model;

use \Billets\Model\Manager;

require_once('model/Manager.php');



class PostManager extends Manager {

	//Retourne tous les billets	
	public function getPosts() {

		$db = $this->dbConnect();

		$posts = $db->query('SELECT billetId, title, content, DATE_FORMAT(date_post, \'%d/%m/%Y a %Hh%imin%ss\')AS new_date FROM posts ORDER BY date_post DESC LIMIT 0,5');

		return $posts;
	}

	//Retourne un billet
	public function getPost(int $postId) {

		$db = $this->dbConnect();

		$req = $db->prepare('SELECT billetId, title, content, DATE_FORMAT(date_post, \'%d/%m/%Y a %Hh%imin%ss\')AS post_date_fr FROM posts WHERE billetId = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	//Ajout Billet
	function postPost($title, $content) {
		
		$db = $this->dbConnect();

		$request = $db->prepare('INSERT INTO posts VALUES (\'\', :title, :content, NOW())');
		$request->execute(array(
			'title' => $title,
			'content' => $content
		));
	}

}

?>