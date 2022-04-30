<?php
$database = [
	"host" => "localhost",
	"user" => "root",
	"pass" => "",
	"name" => "data_msg"
];

class _db {
	public function connect() {
		global $database;
		$connection = mysqli_connect($database['host'], $database['user'], $database['pass'], $database['name']) or die("MÁY CHỦ ĐANG BẢO TRÌ !");
		return $connection;
	}

	public function __construct() {
		$this->connect();
	}

	public function query($sql) {
		$query = mysqli_query($this->connect(), $sql);
		return $query;
	}

	public function result($sql) {
		$query = mysqli_query($this->connect(), $sql);
		$result = mysqli_fetch_assoc($query);

		return $result;
	}

	public function num_rows($sql) {
		$query = mysqli_query($this->connect(), $sql);
		$result = mysqli_num_rows($query);

		return $result;
	}

	public function includeMessage($username, $message) {
		$query = mysqli_query($this->connect(), "INSERT INTO `message` SET 
        	`username` = '$username',
        	`message` = '$message',
        	`time` = '".time()."'
        ");

        if (!$query) {
        	return false;
        }

        return true;
	}
}

$db = new _db;