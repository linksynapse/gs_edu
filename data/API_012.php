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
        if(!$DEBUG_MODE){
            $PARAM = $_POST['DataType'];
            if($PARAM = "JSON"){
                $PARAM = json_decode($_POST['data']);
                $IDX = $_SESSION['idx'];
            }else{
                $IDX = $_SESSION['idx'];
            }
        }else{
            $IDX = 2;
        }
        
        $SQL = 'CALL GET_MYEDUCATIONEx(:in_idx,@RESULT)';
        $STMT = $PDO->prepare($SQL);
        $STMT->bindParam(':in_idx',$IDX,PDO::PARAM_INT);
        $STMT->execute();

        $RESULT = array();
        $RESULT['data'] = $STMT->fetchAll(PDO::FETCH_ASSOC);
        if(!count($RESULT['data'])){
            throw new Exception("No DataSet.");
        }
        else{
            $RESULT['code'] = 0;
        }
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