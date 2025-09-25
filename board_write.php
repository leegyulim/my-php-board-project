<?php
include "main.php";
?>
<?php
    $page = $_REQUEST["page"] ?? 1;
	
	$title = "";
	$writer = "";
	$content = "";
	$action = "board_insert.php";
	
	$num = $_REQUEST["num"] ?? 0;
	
	if ($num > 0) {
	    require("db_connect.php");
	    $query = $db->query("select * from board where num=$num");
	    if ($row = $query->fetch()) {
	    $title = "$row[title]";
	    $writer = "$row[writer]";
	    $content = "$row[content]";
	    $action = "board_update.php?num=$num&page=$page";
		}
	}
?>

<!doctype html>
 <html>
 <head>
     <meta charset="utf-8">
     <style>
         table { width:960px; text-align:center; }
         th    { width:100px; background-color:#CCFFCC; }
         input[type=text], textarea { width:100%; }
     </style>
 </head>
 <body>
 
<form method="post" action="<?=$action?>">
     <table>
         <tr>
             <th>제목</th>
             <td><input type="text" name="title" maxlength="80" value="<?=$title?>"></td>
         </tr>
         <tr>
             <th>작성자</th>
             <td><input type="text" name="writer" maxlength="20" value="<?=$writer?>"></td>
         </tr>
         <tr>
             <th>문의내용</th>
             <td><textarea name="content" rows="10"><?=$content?></textarea></td>
         </tr>
     </table>
 
     <br>
     <input type="submit" value="저장">
     <input type="button" value="취소" onclick="history.back()">
 </form>
 
 </body>
 </html>

