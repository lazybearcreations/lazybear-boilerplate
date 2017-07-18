<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Database {

	function __construct($host, $name, $user, $password) {
		try {
			return new PDO("mysql:host=$host;dbname=$name", $user, $password);
		}
		catch(PDOException $e) {
			return $e->getMessage();
		}
	}

}
