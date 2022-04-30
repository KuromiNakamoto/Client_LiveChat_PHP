<?php 
error_reporting(0);

require("database.php");

if (isset($_POST['username'], $_POST['message']) && !empty($_POST['username']) && !empty($_POST['message'])) {
	$username = $_POST['username'];
	$message = $_POST['message'];

	$truyvan = $db->includeMessage($username, $message);

	if ($truyvan) {
		echo json_encode(array("status" => "thanhcong"));
	} else {
		echo json_encode(array("status" => "thatbai"));
	}
} else {
	echo json_encode(array("status" => "thatbai"));
}