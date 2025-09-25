<?php
    session_start();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php
    if (empty($_SESSION["userId"])) {
?>        
        <form action="login.php" method="post">
            아이디:   <input type="text"     name="id">&ensp;<br>
            비밀번호: <input type="password" name="pw">&ensp;<br>
            <input type="submit" value="로그인">
            <input type="button" value="회원 가입" 
                   onclick="window.open('member_join_form.php', 'popup', 'width=500, height=200')">
        </form>
<?php
    } else {
?>
        <form action="logout.php" method="post">
            <?=$_SESSION["userName"]?>님 로그인 
            <input type="submit" value="로그아웃">
            <input type="button" value="회원정보 수정" 
                   onclick="window.open('member_update_form.php', 'popup', 'width=500, height=200')">
        </form>
<?php        
    }
?>
</body>
</html>
