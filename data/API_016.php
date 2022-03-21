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
        $RIDX = NULL;

        if(!$DEBUG_MODE){
            $PARAM = $_POST['DataType'];
            if($PARAM = "JSON"){
                $PARAM = json_decode($_POST['data']);
                $RIDX = $PARAM->ridx;
                $IDX = $_SESSION['idx'];
            }else{
                $RIDX = $_POST['ridx'];
                $IDX = $_SESSION['idx'];
            }
        }else{
            $IDX = 2;
            $USER = 3;
            $EDUCATION = 4;
        }
        
        $SQL = 'CALL GET_STUDENTEx(:in_idx,:in_ridx,@RESULT)';
        $STMT = $PDO->prepare($SQL);
        $STMT->bindParam(':in_idx',$IDX,PDO::PARAM_INT);
        $STMT->bindParam(':in_ridx',$RIDX,PDO::PARAM_INT);
        $STMT->execute();

        $RESULT = array();
        $RESULT['data'] = $STMT->fetchAll(PDO::FETCH_ASSOC);
        if(!count($RESULT['data'])){
            throw new Exception("No DataSet.");
        }else{
            $RESULT['code'] = 0;
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