<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Database {

	function __construct($host, $db, $user, $password) {
		try {
			return new PDO("mysql:host=$host;dbname=$db", $user, $password);
		}
		catch(PDOException $e) {
			return $e->getMessage();
		}
	}

}
