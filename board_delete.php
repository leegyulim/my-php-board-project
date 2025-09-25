<?php
    $page = $_REQUEST["page"] ?? 1;
    $num = $_REQUEST["num"];
		
		require("db_connect.php");
	    $query = $db->exec("delete from board where num=$num");
		
		header("Location:list.php?page=$page");
?>

