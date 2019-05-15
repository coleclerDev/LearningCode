<?php

namespace Billets\Model;

use \Billets\Model\Manager;

require_once('model/Manager.php');



class CommentManager extends Manager {


	//Ajoute un commentaire
	public function postComment(int $postId, String $author, String $comment) {

		$db = $this->dbConnect();

		$comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES (:postid, :author, :comment, NOW())');
		$affectedlines = $comments->execute(array(
			'postid' => $postId,
			'author' => $author,
			'comment' => $comment
		));

		return $affectedlines;
	}


	//Retourne les commentaires d'un billet
	public function getComments(int $postId) {

		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId));

		return $comments;
	}


	// Retourne un commentaire pour faire le Form updateComment
	public function getComment(int $commentId) {
		$db = $this->dbConnect();

		$comment = $db->prepare('SELECT author, comment FROM comments WHERE id = ?');
		$comment->execute(array($commentId));
		$data_comment = $comment->fetch();

		return $data_comment;
	}


	// Met a jour un commentaire
	public function updateComment(int $commentId, String $author, String $content) {
		$db = $this->dbConnect();

		$comment = $db->prepare('UPDATE comments SET author = :author, comment = :comment WHERE id = :id_comment');
		$count = $comment->execute(array(
			'author' => $author,
			'comment' => $content,
			'id_comment' => $commentId
		));

		return $count;
	}


	public function getPostId(int $commentId) {

		$db = $this->dbConnect();

		$comment = $db->prepare('SELECT post_id FROM comments WHERE id=?');
		$comment->execute(array($commentId));

		$data_comment = $comment->fetch();

		return $data_comment['post_id'];
	}

}

?>