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
        $TO = true;
        $CONTENTS = "";
        if(!$DEBUG_MODE){
            $PARAM = $_POST['DataType'];
            if($PARAM = "JSON"){
                $PARAM = json_decode($_POST['data']);
                $IDX = $_SESSION['idx'];
                $TO = $PARAM->to;
                $CONTENTS = $PARAM->contents;
            }else{
                $IDX = $_SESSION['idx'];
                $TO = $_POST['to'];
                $CONTENTS = $_POST['contents'];
            }
        }else{
            $IDX = 3;
            $TO = "kailnet120";
            $CONTENTS = "ALRAM TEST!!";
        }
        
        $SQL = 'CALL SET_MSG(:in_from,:in_to,:in_contents,@RESULT)';
        $STMT = $PDO->prepare($SQL);
        $STMT->bindParam(':in_from',$IDX,PDO::PARAM_INT);
        $STMT->bindParam(':in_to',$TO,PDO::PARAM_STR,1024);
        $STMT->bindParam(':in_contents',$CONTENTS,PDO::PARAM_LOB);
        $STMT->execute();

        $SQL = 'SELECT @RESULT AS RESULT ';
        $STMT = $PDO->prepare($SQL);
        $STMT->execute();

        $RESULT = array();
        $RESULT['code'] = $STMT->fetch(PDO::FETCH_ASSOC)['RESULT'];
        if($RESULT['code'] != 0){
            $RESULT['data'] = array(array('msg'=>'throw sql exception'));
        }else{
            $RESULT['data'] = array(array('msg'=>'sending success'));
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