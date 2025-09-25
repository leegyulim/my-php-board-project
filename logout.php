
 <!doctype html>
 <html>
 <head>
     <meta charset="utf-8">
 </head>
 <body>

<?php
    session_start();
	
	unset($_SESSION["userId"]);
	unset($_SESSION["userName"]);
	
	header("Location:loginmain.php")
?>
 </body>
 </html> 
