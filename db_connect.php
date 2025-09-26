<?php
    // docker-compose.yml의 서비스 이름(db)을 호스트로 사용
    $host = "db"; 
    // docker-compose.yml에 설정한 데이터베이스 이름
    $dbname = "phpdb";
    // docker-compose.yml에 설정한 사용자 이름
    $user = "php"; 
    // docker-compose.yml에 설정한 비밀번호
    $password = "1234";

    // 포트 번호는 기본값(3306)을 사용하므로 DSN에서 생략
    $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";

    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // 실제 서비스에서는 에러 로그를 파일에 기록해야 합니다.
        die("DB Connection Failed: " . $e->getMessage());
    }