<?php
include /*$_SERVER['DOCUMENT_ROOT'].*/'./cfg/static.php';
include /*$_SERVER['DOCUMENT_ROOT'].*/"./cfg/db.php";


session_start();
if(!isset($_SESSION['idx']) || $_SESSION['level'] > 5){
	header("location:/");
}

$SQL = "DELETE FROM BOARD_NOTICE WHERE idx = ".$_GET['idx'];
$STMT = $PDO->prepare($SQL);
$STMT->execute();

?>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script language="javascript">
            $(document).ready(function() {
                location.href = "/index.php";
            });
        </script>
    </head>
    <body></body>
</html>

