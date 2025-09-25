 <!doctype html>
 <html>
 <head>
     <meta charset="utf-8">
 </head>
 <body>

<?php
    $id = $_REQUEST["id"];
	$pw = $_REQUEST["pw"];
	$name = $_REQUEST["name"];
	$tel = $_REQUEST["tel"];
	$addr = $_REQUEST["addr"];
	
	require("db_connect.php");
	
	//$db = new PDO("mysql:host=localhost;port=3307;dbname=phpdb", "php", "1234");
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // 같은 코드를 반복해서 쓰는건 안좋음
	
	if (!($id && $pw && $name && $tel && $addr)) {
?>
    <script>
	    alert('빈칸 없이 입력해야 합니다.');
		history.back();
	</script>
<?php
	} else if ($db->query("select * from member where id='$id'")->fetch()) {// 이미 있는 아이디이면
?>		
	<script>
	    alert('이미 등록된 아이디 입니다.');
		history.back();
	</script>
<?php	
    } else {
	    
	    $db->exec("insert into member values ('$id', '$pw', '$name', '$tel', '$addr')");
?>
        가입이 완료되었습니다.<br>
        <input type="button" value="로그인 화면으로" onclick="location.href='loginmain.php'">
<?php
    }
?>


 </body>
 </html> 
