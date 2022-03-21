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
    
    try{
        $IDX = -1;
        $RECEIVER = -1;
        if(!$DEBUG_MODE){
            $PARAM = $_POST['DataType'];
            if($PARAM = "JSON"){
                $PARAM = json_decode($_POST['data']);
                $IDX = $PARAM->idx;
                $RECEIVER = $_SESSION['idx'];
            }else{
                $IDX = $_POST['idx'];
                $RECEIVER = $_SESSION['idx'];
            }
        }else{
            $IDX = 2;
            $RECEIVER = 2;
        }
        
        $SQL = 'CALL READ_MSG(:in_idx,:in_receiver,@RESULT)';
        $STMT = $PDO->prepare($SQL);
        $STMT->bindParam(':in_idx',$IDX,PDO::PARAM_INT);
        $STMT->bindParam(':in_receiver',$RECEIVER,PDO::PARAM_INT);
        $STMT->execute();

        $SQL = 'SELECT @RESULT AS RESULT ';
        $STMT = $PDO->prepare($SQL);
        $STMT->execute();

        $RESULT = array();
        $RESULT['code'] = $STMT->fetch(PDO::FETCH_ASSOC)['RESULT'];
        if($RESULT['code'] != 0){
            $RESULT['data'] = array(array('msg'=>'throw sql exception'));
        }else{
            $RESULT['data'] = array(array('msg'=>'reading ok'));
        }
        
        die(json_encode($RESULT));
    }catch(Exception $e){
        $SQL = 'SELECT IFNULL(@RESULT,-1) AS RESULT ';
        $STMT = $PDO->prepare($SQL);
        $STMT->execute();

        $RESULT = array();
        $RESULT['code'] = $STMT->fetch(PDO::FETCH_ASSOC)['RESULT'];
        $RESULT['data'] = array(array('msg'=>$e->getMessage()));
        die(json_encode($RESULT));
    }
?>