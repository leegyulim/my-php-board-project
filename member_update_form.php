<?php
    // STEP 1: 가장 먼저 세션을 시작합니다.
    // 이 위에는 어떤 공백이나 문자도 없어야 합니다.
    session_start();

    // STEP 2: DB 접속 파일을 먼저 include 합니다.
    require("db_connect.php");

    // STEP 3: 세션에서 로그인한 사용자 ID를 가져옵니다.
    // 이전 'login.php'에서 사용한 세션 변수 이름과 대소문자까지 정확히 일치해야 합니다.
    // 만약 로그인 시 $_SESSION['userId']로 저장했다면 아래 코드를 사용하세요.
    if (!isset($_SESSION["userId"]) || empty($_SESSION["userId"])) {
        // 만약 로그인되지 않은 상태라면, 메시지를 보여주고 로그인 페이지로 쫓아냅니다.
        // PHP의 header() 함수를 사용하기 전에 어떤 출력도 없어야 합니다.
        echo "<script>
                alert('먼저 로그인을 해주세요.');
                location.href = 'login.php';
              </script>";
        exit; // 더 이상 아래 코드를 실행하지 않고 즉시 종료합니다.
    }
    
    // 세션에서 사용자 ID를 안전하게 가져옵니다.
    $id = $_SESSION["userId"];

    // STEP 4: DB에서 해당 사용자의 정보를 안전하게 조회합니다. (SQL Injection 방지)
    try {
        // :id 라는 placeholder를 사용합니다.
        $query = $db->prepare("select * from member where id = :id");
        // placeholder에 실제 변수 값을 바인딩합니다.
        $query->bindValue(":id", $id, PDO::PARAM_STR);
        // 쿼리를 실행합니다.
        $query->execute();
        
        // 조회 결과를 가져옵니다.
        if ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            // 결과가 있을 경우, 각 변수에 값을 할당합니다.
            $pw   = $row["pw"];
            $name = $row["name"];
            $tel  = $row["tel"];
            $addr = $row["addr"];
        } else {
            // DB에는 해당 사용자 정보가 없는 비정상적인 경우
            // (세션은 있는데 DB 데이터가 삭제된 경우 등)
            echo "<script>
                    alert('사용자 정보를 찾을 수 없습니다. 다시 로그인해주세요.');
                    location.href = 'logout.php';
                  </script>";
            exit;
        }

    } catch (PDOException $e) {
        // DB 쿼리 실행 중 오류가 발생한 경우
        die("DB 쿼리 오류: " . $e->getMessage());
    }
	
    // STEP 5: 이제 모든 데이터 준비가 끝났으니, HTML 출력을 시작합니다.
    // 웹사이트의 공통 레이아웃(헤더, 메뉴 등)이 있다면 여기서 include 합니다.
    include "header.php"; // 예시: 웹사이트 상단 메뉴 등
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>회원 정보 수정</title>
</head>
<body>

<!-- 
    'include "main.php"'는 보통 웹사이트의 메인 화면 전체를 의미하므로,
    정보 수정 폼에서는 이 파일을 include하지 않는 것이 일반적입니다.
    대신, 필요한 상단 메뉴 등은 'header.php'와 같은 파일로 분리하여 include 합니다.
-->

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
		if(confirm("정말 탈퇴하시겠습니까? 관련된 모든 정보가 삭제됩니다."))
		{
            location.href="member_delete.php";
		}
	}
</script>

<?php
    include "footer.php"; // 예시: 웹사이트 하단 정보 등
?>
</body>
</html>
