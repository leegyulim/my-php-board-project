<?php
include "main.php";
?>
<?php
session_start();

    $id = $_SESSION["userId"] ?? "";
    
    require("db_connect.php");
    
	if ($id) {
        $query = $db->query("select * from member where id='$id'");
        $row = $query->fetch();
            
        $pw   = $row["pw"  ];
        $name = $row["name"];
    	$tel  = $row["tel" ];
    	$addr = $row["addr"];
	} else {
?>
	<script>
    alert('먼저 로그인을 해주세요.');
	history.back();
    </script>
<?php	
	}
	
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<form action="member_update.php" method="post">
    <table>
        <tr>
            <td>아이디</td>
            <td><input type="text" name="id" readonly value="<?=$id?>"></td>
        </tr>
        
        <tr>    
            <td>비밀번호</td>
            <td><input type="password" name="pw" value="<?=$pw?>"></td>
        </tr>
        
        <tr>
            <td>이름</td>
            <td><input type="text" name="name" value="<?=$name?>"></td>
        </tr>
		
		<tr>
            <td>전화번호</td>
            <td><input type="text" name="tel" value="<?=$tel?>"></td>
        </tr>
		
		<tr>
            <td>주소</td>
            <td><input type="text" name="addr" value="<?=$addr?>"></td>
        </tr>
        </table>
    <input type="submit" value="등록">
	<input type="button" onclick="memberdel()" value="회원탈퇴">
</form>
<script>
    function memberdel(){
		if(confirm("정말 탈퇴하시겠습니까?"))
		{
            location.href="member_delete.php";
		} else {
			location.href="member_update_form.php";
		}
	}
</script>
</body>
</html>
