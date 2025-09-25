<?php
session_start();
include 'main.php';
?>
<?php
	$id = $_SESSION["userId"];
		
		require("db_connect.php");
	    $query = $db->exec("delete from member where id='$id'");
		
	echo "<script>location.href='index.php';</script>"
?>

