-- --------------------------------------------------------
-- 호스트:                          127.0.0.1
-- 서버 버전:                        10.4.24-MariaDB - mariadb.org binary distribution
-- 서버 OS:                        Win64
-- HeidiSQL 버전:                  11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- phpdb 데이터베이스 구조 내보내기
DROP DATABASE IF EXISTS `phpdb`;
CREATE DATABASE IF NOT EXISTS `phpdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `phpdb`;

-- 테이블 phpdb.board 구조 내보내기
DROP TABLE IF EXISTS `board`;
CREATE TABLE IF NOT EXISTS `board` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `writer` varchar(20) DEFAULT NULL,
  `title` varchar(60) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `regtime` varchar(20) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 phpdb.board:~10 rows (대략적) 내보내기
DELETE FROM `board`;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
INSERT INTO `board` (`num`, `writer`, `title`, `content`, `regtime`, `hits`) VALUES
	(1, '홍길동', '글 1', '글의 내용 1', '2022-10-20 12:25:19', 0),
	(2, '이순신', '글 2', '글의 내용 2', '2017-07-30 10:10:12', 0),
	(4, '김수로', '글 4', '글의 내용 4', '2022-10-20 12:27:58', 0),
	(6, '김수로', '글 6', '글의 내용 6', '2022-11-23 14:59:58', 0),
	(7, '홍길동', '글 7', '글의 내용 7', '2017-07-30 10:10:17', 0),
	(9, '아에이오우', '아아아', '도레미', '2022-10-13 12:18:24', 0),
	(10, '도룡뇽', '도구', '도마뱀', '2022-10-13 12:19:07', 0),
	(11, '에구', '오구', '이쿠', '2022-10-13 12:19:20', 0),
	(12, '123', '123', '123', '2022-10-13 12:25:47', 0),
	(13, '고', '모', '너', '2022-10-20 12:23:23', 0),
	(17, 'ㄴㅇㄹ', 'ㄹㅇㅎ', 'ㄴㅇㄹ', '2022-11-16 13:30:23', 0);
/*!40000 ALTER TABLE `board` ENABLE KEYS */;

-- 테이블 phpdb.member 구조 내보내기
DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` varchar(20) NOT NULL,
  `pw` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `addr` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 phpdb.member:~2 rows (대략적) 내보내기
DELETE FROM `member`;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` (`id`, `pw`, `name`, `tel`, `addr`) VALUES
	('gyu', 'gyu', '이규', '01095895678', '경기도 성남시 분당구'),
	('hong', '1234', 'leegyu', '010-0000-0000', '경기도 용인시');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;

-- 테이블 phpdb.product 구조 내보내기
DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `writer` varchar(20) DEFAULT NULL,
  `title` varchar(60) DEFAULT NULL,
  `explanation` text DEFAULT NULL,
  `regtime` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  PRIMARY KEY (`num`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 phpdb.product:~9 rows (대략적) 내보내기
DELETE FROM `product`;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`num`, `writer`, `title`, `explanation`, `regtime`, `image`, `hits`) VALUES
	(20, '홍길동', '명품가방 팝니다', '비싼 가방이에요', '2022-11-23 15:20:37', '1000441903864_i1_500.jpg', 0),
	(21, '박철수', '휴대폰 팝니다', '최신 핸드폰 싸게 팔아요.', '2022-11-23 15:21:09', 'phone.jpg', 0),
	(22, '김영희', '얼마 입지 않은 상의 팝니다.', '2주 전에 샀던 상의입니다.', '2022-11-23 15:22:19', 'top.jpg', 0),
	(23, '퉁퉁이', '편한 바지 팝니다.', '사이즈 : 100\r\n색상 : 하얀색\r\n등등 ', '2022-11-23 15:23:15', 'pants.jpg', 0),
	(24, '최윤호', '산지 6개월 된 무선 이어폰 팝니다.', '가격 : 10 만원\r\n상태 : 상\r\n직거래만 합니다~', '2022-11-24 10:45:45', '28555335556.20220429100509.jpg', 0),
	(25, '최영식', '유아 신발 팝니다.', '모델명 : 00모델\r\n사이즈 : 225\r\n가격 : 5만원\r\n색상 : 화이트', '2022-11-24 11:02:40', 'search.pstatic.jpg', 0),
	(26, '김선우', '야구모자 팝니다.', '모델명 : 00모델\r\n사이즈 : 55\r\n가격 : 3만원\r\n색상 : 노랑색', '2022-11-24 11:05:31', 'cap.jpg', 0),
	(27, '김순자', '청소기 팝니다.', '모델명 : 00모델\r\n가격 : 10만원\r\n색상 : 빨간색', '2022-11-24 11:08:44', 'cleaner.jpg', 0),
	(28, '이태준', '냉장고 팝니다.', '모델명 : 000모델\r\n가격 : 100만원\r\n등등', '2022-11-24 11:11:36', 'fridge.jpg', 0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
