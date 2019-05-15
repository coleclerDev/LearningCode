<?php

namespace Billets\Model;



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
