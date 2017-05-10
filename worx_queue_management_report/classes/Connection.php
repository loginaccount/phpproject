<?php

class Connection {

	public static function make(){
		$connection = new mysqli('localhost','root','','');

		//Output any connection error
		if ($connection->connect_error) {
		    die('Error : ('. $connection->connect_errno .') '. $connection->connect_error);
		}

		return $connection;
	}

}