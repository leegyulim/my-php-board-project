
<!doctype html>
 <html>
 <head>
     <meta charset="utf-8">
	  <style>
  * {
  margin:0;
  padding:0;
  }
  ul {
  list-style-type:none;
  }h3 {
  margin:20px 0 0 50px;
  }
  #mem_form {
  width:500px;
  margin:10px 0 0 50px;
  font-family:"돋움";
  font-size:12px;
  color:#444444;
  padding-top:5px;
  padding-bottom:10px;
  border-top:solid 1px #cccccc;
  border-bottom:solid 1px #cccccc;
  }
  .cols li {
  display:inline-block;
  margin-top:5px;
  }
  .cols li.col1 {
  width:100px;
  text-align:right;
  }
  .cols li.col2 {
  width:350px;
  }
  .cols li.col2 input.hp {
  width:35px;
  }
  #intro {
  vertical-align:top;
  }
  </style>
</head>
<body>
<h3>중고거래 회원가입</h3>
 <form action="member_join.php" method="post">
 <ul id="mem_form">
 <li>
 <ul class="cols">
 <li class="col1">아이디 :</li>
 <li class="col2"><input type="text" name="id"></li>
 </ul>
 </li>
 <li>
 <ul class="cols">
 <li class="col1">비밀번호 :</li>
 <li class="col2"><input type="password" name="pw"></li>
 </ul>
 </li>
 <li>
 <ul class="cols">
 <li class="col1">이름 :</li>
 <li class="col2"><input type="text" name="name"></li>
 </ul>
 </li>
 <li>
 <ul class="cols">
 <li class="col1">전화번호 :</li>
 <li class="col2"><input type="text" name="tel"></li>
 </ul>
 </li>
 <li>
 <ul class="cols">
 <li class="col1">주소 :</li>
 <li class="col2"><input type="text" name="addr"></li>
 </ul>
 </li>
 <li>
 <ul class="cols">
 <li class="col1">
 <li class="col2"><input type="submit" value="가입"></li></li><br>
 </ul>
 </li>
 <li>
 <ul class="cols">
 <li class="col1">
 <li class="col2"><input type="button" value="로그인 화면으로" onclick="history.back()"></li></li>
 </ul>
 </li>
 </ul>
 </form>
</body>
</html> 
