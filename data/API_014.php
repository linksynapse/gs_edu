<?php
    /* Create By GYEONG TAE, LEE 2020. 01. 30 */
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
        $IDX = NULL;

        if(!$DEBUG_MODE){
            $PARAM = $_POST['DataType'];
            if($PARAM = "JSON"){
                $PARAM = json_decode($_POST['data']);
                $IDX = $PARAM->idx;
            }else{
                $IDX = $_POST['idx'];
            }
        }else{
            $IDX = 3;
        }

        $SQL = 'CALL REJECT_EDUCATION(:in_idx,@RESULT)';
        $STMT = $PDO->prepare($SQL);
        $STMT->bindParam(':in_idx',$IDX,PDO::PARAM_INT);
        $STMT->execute();

        $SQL = 'SELECT @RESULT AS RESULT ';
        $STMT = $PDO->prepare($SQL);
        $STMT->execute();

        $RESULT = array();
        $RESULT['code'] = $STMT->fetch(PDO::FETCH_ASSOC)['RESULT'];
        if($RESULT['code'] != 0){
            $RESULT['data'] = array(array('msg'=>'throw sql exception'));
        }else{
            $RESULT['data'] = array(array('msg'=>'apply education ok'));
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