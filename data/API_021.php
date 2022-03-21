<?php
    /* Create By GYEONG TAE, LEE 2020. 01. 29 */
    include /*$_SERVER['DOCUMENT_ROOT'].*/'./cfg/static.php';
    include /*$_SERVER['DOCUMENT_ROOT'].*/"./cfg/db.php";
    session_start();

    if(!$DEBUG_MODE){
        ini_set('display_errors', '0');
        header('Content-Type: application/json');
    }else{
        printf('[+] DEBUG MODE : ');
    }
    
    if(!isset($_SESSION['idx']) || $_SESSION['level'] > 5){
		header("location:/");
	}
    
    try{
        
        $USER = -1;
        if(!$DEBUG_MODE){
            $PARAM = $_POST['DataType'];
            if($PARAM = "JSON"){
                $PARAM = json_decode($_POST['data']);
                $USER = $PARAM->user;
            }else{
                $USER = $_POST['user'];
            }
        }else{
            $USER = 2;
        }
        
        $SQL = 'DELETE FROM USER WHERE idx = '.$USER;
        $STMT = $PDO->prepare($SQL);
        $STMT->execute();
        
        $RESULT = array();
        $RESULT['code'] = 0;
        die(json_encode($RESULT));

    }catch(Exception $e){
        $SQL = 'SELECT IFNULL(@RESULT,-1) AS RESULT ';
        $STMT = $PDO->prepare($SQL);
        $STMT->execute();

        $RESULT = array();
        $RESULT['code'] = $STMT->fetch(PDO::FETCH_ASSOC)['RESULT'];
        if($RESULT['code'] == 0){
            $RESULT['code'] = -2;
        }
        $RESULT['data'] = array(array('msg'=>$e->getMessage()));
        die(json_encode($RESULT));
    }
?>