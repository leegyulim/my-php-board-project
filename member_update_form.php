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
<h2>회원 정보 수정</h2>
<form action="member_update.php" method="post">
    <table>
        <tr>
            <td>아이디</td>
            <!-- 보안을 위해 출력 시 htmlspecialchars()를 사용합니다. -->
            <td><input type="text" name="id" readonly value="<?= htmlspecialchars($id) ?>"></td>
        </tr>
        
        <tr>    
            <td>비밀번호</td>
            <td><input type="password" name="pw" value="<?= htmlspecialchars($pw) ?>"></td>
        </tr>
        
        <tr>
            <td>이름</td>
            <td><input type="text" name="name" value="<?= htmlspecialchars($name) ?>"></td>
        </tr>
		
		<tr>
            <td>전화번호</td>
            <td><input type="text" name="tel" value="<?= htmlspecialchars($tel) ?>"></td>
        </tr>
		
		<tr>
            <td>주소</td>
            <td><input type="text" name="addr" value="<?= htmlspecialchars($addr) ?>"></td>
        </tr>
    </table>
    <input type="submit" value="수정 완료">
	<input type="button" onclick="memberdel()" value="회원 탈퇴">
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
