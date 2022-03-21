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
        $IDX = NULL;
        $STIME = NULL;
        $ETIME = NULL;
        $TITLE = NULL;
        $CONTENTS = NULL;
        $TOTAL = NULL;

        if(!$DEBUG_MODE){
            $PARAM = $_POST['DataType'];
            if($PARAM = "JSON"){
                $PARAM = json_decode($_POST['data']);
                $IDX = $_SESSION['idx'];
                $STIME = $PARAM->stime;
                $ETIME = $PARAM->etime;
                $TITLE = $PARAM->title;
                $CONTENTS = $PARAM->contents;
                $TOTAL = $PARAM->total;
            }else{
                $IDX = $_SESSION['idx'];
                $STIME = $_POST['stime'];
                $ETIME = $_POST['etime'];
                $TITLE = $_POST['title'];
                $CONTENTS = $_POST['contents'];
                $TOTAL = $_POST['total'];
            }
        }else{
            $IDX = 2;
            $STIME = date("2020-01-09 17:50");
            $ETIME = date("2020-01-09 18:50");
            $TITLE = "TEST TITLE";
            $CONTENTS = "TEST CONTENTS";
            $TOTAL = 20;
        }
        
        $SQL = 'CALL ADD_EDUCATION(:in_idx,:in_stime,:in_etime,:in_title,:in_contents,:in_total,@RESULT)';
        $STMT = $PDO->prepare($SQL);
        $STMT->bindParam(':in_idx',$IDX,PDO::PARAM_INT);
        $STMT->bindParam(':in_stime',$STIME);
        $STMT->bindParam(':in_etime',$ETIME);
        $STMT->bindParam(':in_title',$TITLE,PDO::PARAM_LOB);
        $STMT->bindParam(':in_contents',$CONTENTS,PDO::PARAM_LOB);
        $STMT->bindParam(':in_total',$TOTAL,PDO::PARAM_INT);
        $STMT->execute();

        $SQL = 'SELECT @RESULT AS RESULT ';
        $STMT = $PDO->prepare($SQL);
        $STMT->execute();

        $RESULT = array();
        $RESULT['code'] = $STMT->fetch(PDO::FETCH_ASSOC)['RESULT'];
        if($RESULT['code'] != 0){
            $RESULT['data'] = array(array('msg'=>'throw sql exception'));
        }else{
            $RESULT['data'] = array(array('msg'=>'create education ok'));
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