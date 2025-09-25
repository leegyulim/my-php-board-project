<?php
include "main.php";
?>
<?php
    $page = $_REQUEST["page"] ?? 1;
	
	$title = "";
	$writer = "";
	$image = "";
	$explanation = "";
	$action = "product_insert.php";
	
	$num = $_REQUEST["num"] ?? 0;
	
	if ($num > 0) {
	    require("db_connect.php");
	    $query = $db->query("select * from product where num=$num");
	    if ($row = $query->fetch()) {
	    $title = "$row[title]";
	    $writer = "$row[writer]";
		$image = "$row[image]";
	    $explanation = "$row[explanation]";
	    $action = "product_update.php?num=$num&page=$page";
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
 
<form method="post" action="<?=$action?>" enctype="multipart/form-data">
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
             <th>상품이미지</th>
             <td>업로드할 사진을 선택해주세요.<br><input type="file" name="upload" value="<?=$image?>"></td>
         </tr>
         <tr>
             <th>상품설명</th>
             <td><textarea name="explanation" rows="10"><?=$explanation?></textarea></td>
         </tr>
     </table>
	 <br>
     <input type="submit" value="상품 올리기"><br><br>
     <input type="button" value="나가기" onclick="history.back()">
 </form>
 
 </body>
 </html>

