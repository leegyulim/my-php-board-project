<?php
include "main.php";
?>
<!doctype html>
 <html>
 <head>
     <meta charset="utf-8">
     <style>
         table     { width:960px;height:300px; text-align:center; }
         th        { background-color:#CCFFCC; }
         
         .num      { width:100px;  text-align:center;}
         .title    { width:300px;  text-align:center;}
         .writer   { width:150px;  text-align:center;}
         .regtime  { width:250px;  text-align:center;}
		 .hits     { width:160px;  text-align:center;}
 
         a         { text-decoration:none; }    
         a:link    { color:blue; }
         a:visited { color:black; }
         a:hover   { color:red;  }
        
         .left     { text-align:left; }

         .centeringContainer { text-align: center; }
         .centered { display: table; margin: auto; display: inline-block; }
     </style>
 </head>
<body>
 
 <table>
     <div class="centeringContainer">
        <span class="centered">
                 <tr>
                     <th class="num"    >상품번호  </th>
                     <th class="title"  >제목      </th>
                     <th class="writer" >작성자    </th>
                     <th class="regtime">작성일시  </th>
					 <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp조회수    </th>
                 </tr>
             </span>
         </div>
     <?php
         $listSize = 4;
     	
         $page = $_REQUEST["page"] ?? 1;
     	
     	 $start = ($page - 1) * $listSize;
     	
         require("db_connect.php");
     	
     	$query = $db->query("select * from product order by num desc limit $start, $listSize");
     	while ($row = $query->fetch()) {
     ?>    
          <tr>
              <td><?=$row["num"]?></td>
              <td style="text-align:left;"><a href="product_view.php?num=<?=$row["num"]?>&page=<?=$page?>"><?=$row["title"]?></a></td>
              <td><?=$row["writer"]?></td>
              <td><?=$row["regtime"]?></td>
              <td><?=$row["hits"]?></td>
          </tr>
     <?php
         }
     ?>
 <table>
 
 <br>
 <div style="width:960px; text-align:center;" >
 <?php
    $paginationSize = 2;
	
    $firstLink = floor(($page - 1) / $paginationSize) * $paginationSize + 1;
	$lastLink = $firstLink + $paginationSize - 1;
	
	$query = $db->query("select count(*) from product");
	$row = $query->fetch();
	$numRecords = $row[0];
	$numPages = ceil($numRecords / $listSize);
	if ($lastLink > $numPages) {
		$lastLink = $numPages;
	}
	if ($firstLink > 1) {
		$link = $firstLink - 1;
		echo "<a href=\"product_list.php?page=$link\">이전</a> ";
	}
	
	for ($i = $firstLink; $i <= $lastLink; $i++) {
	    if ($i == $page) {
			echo"<a href=\"product_list.php?page=$i\"><u>$i</u></a> ";
		} else {
		    echo "<a href=\"product_list.php?page=$i\">$i</a> ";
		} 
	}
	
	if ($lastLink < $numPages) {
		$link = $lastLink + 1;
		echo "<a href=\"product_list.php?page=$link\">다음</a> "; 
    }
?>
 </div>
 
 <br>
 <input type="button" value="상품 올리기" onclick="location.href='product_write.php'">
 
 
 </body>
 </html>
