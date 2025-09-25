<?php
    require("db_connect.php");
	
    $page = $_REQUEST["page"] ?? 1;

    $title= $_REQUEST["title"];
	$writer= $_REQUEST["writer"];
	$explanation= $_REQUEST["explanation"];
	$image = "";
	if ((isset($_FILES["upload"]["error"]) && $_FILES["upload"]["error"] == UPLOAD_ERR_OK)) {
         $image = $_FILES["upload"]["name"];
    }
	
	if ($title && $writer && $explanation && $image) {
		$regtime = date("Y-m-d H:i:s");
		
		require("db_connect.php");
	    $query = $db->exec("insert into product (writer, title, image, explanation, regtime, hits)
		                    values ('$writer', '$title', '$image', '$explanation', '$regtime', 0)");
		
		header("Location:product_list.php?page=$page");
		exit;
	}
    
?>
<!doctype html>
 <html>
 <head>
     <meta charset="utf-8">
 </head>
 <body>
<script>
    alert('모든 항목이 빈칸없이 입력되어야 합니다.');
	history.back();
</script>
 </body>
 </html>
<?php
    if ($image) {
        $save_name = iconv("utf-8", "cp949", $image);

        if (file_exists("files/$save_name")) {
            $errMsg = "이미 업로드한 파일입니다.";
            
        } else if (!move_uploaded_file($image, "files/$save_name")) {
            $errMsg = "파일 이동 중 에러!";
        }
    }
?>