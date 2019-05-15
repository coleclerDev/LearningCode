<?php

namespace Billets\Model;


/** Connection to the database
 * 
 * You must configure with your database informations
 *
 **/

class Manager {

	protected function dbConnect() {
		
		$db = new \PDO('mysql:host=localhost;dbname=namedb;charset=utf8', 
			'',
			'',
			array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));

		return $db;	

	}

}

?>
