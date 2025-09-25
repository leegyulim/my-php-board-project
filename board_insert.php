<?php
    $page = $_REQUEST["page"] ?? 1;

    $title= $_REQUEST["title"];
	$writer= $_REQUEST["writer"];
	$content= $_REQUEST["content"];
	
	if ($title && $writer && $content) {
		$regtime = date("Y-m-d H:i:s");
		
		require("db_connect.php");
	    $query = $db->exec("insert into board (writer, title, content, regtime, hits)
		                    values ('$writer', '$title', '$content', '$regtime', 0)");
		
		header("Location:list.php?page=$page?");
		exit;
	}
    
?>
<!doctype html>
 <html>
 <head>
     <meta charset="utf-8">
 </head>
 <body>
    
<script>
    alert('모든 항목이 빈칸없이 입력되어야 합니다.');
	history.back();
</script>
 </body>
 </html>
