<?php
include /*$_SERVER['DOCUMENT_ROOT'].*/'./cfg/static.php';
include /*$_SERVER['DOCUMENT_ROOT'].*/"./cfg/db.php";


session_start();
if(!isset($_SESSION['idx']) || $_SESSION['level'] > 5){
	header("location:/");
}

if(isset($_FILES['upfile']) && $_FILES['upfile']['name'] != "") {
    $file = $_FILES['upfile'];
    $upload_directory = '../ndrive/';
    $ext_str = "hwp,xls,doc,xlsx,docx,pdf,jpg,gif,png,txt,ppt,pptx";
    $allowed_extensions = explode(',', $ext_str);
    $max_file_size = 5242880;
    $ext = substr($file['name'], strrpos($file['name'], '.') + 1);
    // 확장자 체크
    if(!in_array($ext, $allowed_extensions)) {
        echo "can not upload file extension.";
    }
    // 파일 크기 체크
    if($file['size'] >= $max_file_size) {
        echo "permmit file size 5mb under";
    }
    $path = md5(microtime()) . '.' . $ext;
    if(move_uploaded_file($file['tmp_name'], $upload_directory.$path)) {
        $file_id = md5(uniqid(rand(), true));
        $name_orig = $file['name'];
        $name_save = $path;
        $SQL = "insert into BOARD_NOTICE values (NULL,'".$_SESSION['idx']."','".$_POST['title']."','".htmlentities($_POST['context'])."',CURRENT_TIMESTAMP(),'".$file_id."','".$name_orig."','".$name_save."')";
        $STMT = $PDO->prepare($SQL);
        $STMT->execute();
        echo "helo";
    }
}else{
    $SQL = "insert into BOARD_NOTICE values (NULL,'".$_SESSION['idx']."','".$_POST['title']."','".htmlentities($_POST['context'])."',CURRENT_TIMESTAMP(),'','','')";
    $STMT = $PDO->prepare($SQL);
    $STMT->execute();
    echo "die";
}



?>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script language="javascript">
            $(document).ready(function() {
                self.close();
            });
        </script>
    </head>
    <body></body>
</html>

