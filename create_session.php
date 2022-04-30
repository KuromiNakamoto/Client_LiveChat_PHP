<?php
session_start();

if (isset($_POST['username']) && !empty($_POST['username'])) {
	$_SESSION['user'] = $_POST['username'];
	echo json_encode(array("status" => "thanhcong", "msg" => "SUCCESS"));
} else {
	echo json_encode(array("status" => "thatbai", "msg" => "Vui lòng điền đầy đủ thông tin !"));
}