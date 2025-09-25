# 1. 베이스 이미지: Apache 웹 서버와 PHP 8.0이 설치된 공식 이미지를 사용합니다.
FROM php:8.0-apache

# 2. 필요한 PHP 확장 모듈 설치
#    - pdo_mysql: PDO 방식으로 MariaDB/MySQL에 접속하기 위해 필수입니다.
#    - gd: 이미지 처리(썸네일 등)에 필요할 수 있습니다. (선택사항)
RUN docker-php-ext-install pdo_mysql

# 3. Apache의 mod_rewrite 활성화 (URL을 예쁘게 만들기 위해 필요할 수 있음)
RUN a2enmod rewrite

# 4. 현재 폴더의 모든 소스 코드를 컨테이너의 웹 루트 디렉토리(/var/www/html)로 복사합니다.
COPY . /var/www/html/

# 5. 소스 코드 파일의 권한을 웹 서버(www-data)가 읽고 쓸 수 있도록 변경합니다.
#    (파일 업로드 기능이 있을 경우 쓰기 권한이 필요합니다.)
RUN chown -R www-data:www-data /var/www/html