<?php
    $page = $_REQUEST["page"] ?? 1;
    $num = $_REQUEST["num"];
		
		require("db_connect.php");
	    $query = $db->exec("delete from product where num=$num");
		
		header("Location:product_list.php?page=$page");
?>

