<?php 
error_reporting(0);

require("database.php");

$count = $db->num_rows("SELECT * FROM `message`");

$val1 = $count - 10;
$val2 = $count;

$truyvan = $db->query("SELECT * FROM `message` LIMIT ".$val1.",".$val2."");

if ($count) {
	while ($row = mysqli_fetch_assoc($truyvan)) {
		echo "
		<div>
			<div class='msg-box'>
	        	<p><strong class='msg-box-user'>".$row['username']." :</strong> ".$row['message']."</p>
	    	</div>
		</div>
		";
	}
} else {
	echo "<p id='non-msg' style='text-align:center;'>Hiện tại chưa có tin nhắn nào !</p>";
}
