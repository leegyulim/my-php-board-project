<?php
include "main.php";
?>
<?php
    $page = $_REQUEST["page"] ?? 1;
    
    $num= $_REQUEST["num"];
    require("db_connect.php");
	
	$query = $db->query("select * from board where num=$num");
	if ($row = $query->fetch()) {
		$writer = $row["writer"];
		$regtime = $row["regtime"];
		$hits = $row["hits"];
		
		$title = str_replace(" ", "&nbsp", $row["title"]);
	    $content = str_replace(" ", "&nbsp", $row["content"]);
		$content = str_replace("\n", "<br>", $content);
	    $db -> exec ("update board set hits= hits + 1 where num=$num");
	}
?>
<!doctype html>
 <html>
 <head>
     <meta charset="utf-8">
     <style>
         table { width:680px; text-align:center; }
         th    { width:100px; background-color:#CCFFCC;; }
         td    { text-align:left; border:1px solid gray; }
     </style>
 </head>
 <body>
 
<table>

     <tr>
         <th>제목</th><td><?=$title?></td>
     </tr>
     <tr>
         <th>작성자</th><td><?=$writer?></td>
     </tr>
     <tr>
         <th>작성일시</th><td><?=$regtime?></td>
     </tr>
     <tr>
         <th>조회수</th><td><?=$hits?></td>
     </tr>
     <tr>
         <th>문의내용</th><td><?=$content?></td>
     </tr>

 </table>
 
 <br>
 <input type="button" value="목록보기" onclick="location.href='board_list.php?page=<?=$page?>'">
 <input type="button" value="수정"     onclick="location.href='board_write.php?num=<?=$num?>&page=<?=$page?>'">
 <input type="button" value="삭제"     onclick="location.href='board_delete.php?num=<?=$num?>&page=<?=$page?>'">
 
 </body>
 </html>
