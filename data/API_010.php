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
        $IDENTIFY = NULL;
        $PASSWORD = NULL;

        if(!$DEBUG_MODE){
            $PARAM = $_POST['DataType'];
            if($PARAM = "JSON"){
                $PARAM = json_decode($_POST['data']);
                $IDENTIFY = $PARAM->identify;
                $PASSWORD = $PARAM->password;
            }else{
                $IDENTIFY = $_SESSION['identify'];
                $PASSWORD = $_POST['password'];
            }
        }else{
            $IDENTIFY = "administrator";
            $PASSWORD = "ptwa200103420";
        }
        
        $SQL = 'CALL AUTH_USER(:in_identify,:in_password,@RESULT,@IDX,@LEVEL)';
        $STMT = $PDO->prepare($SQL);
        $STMT->bindParam(':in_identify',$IDENTIFY,PDO::PARAM_LOB);
        $STMT->bindParam(':in_password',$PASSWORD,PDO::PARAM_LOB);
        $STMT->execute();

        $SQL = 'SELECT @RESULT AS RESULT, IFNULL(@IDX,-1) AS IDX,@LEVEL AS ACCESSLEVEL';
        $STMT = $PDO->prepare($SQL);
        $STMT->execute();

        $RESULT = array();
        $RETURN = $STMT->fetchAll(PDO::FETCH_ASSOC);
        $RESULT['code'] = $RETURN[0]['RESULT'];
        $_SESSION['idx'] = $RETURN[0]['IDX'];
		$_SESSION['level'] = $RETURN[0]['ACCESSLEVEL'];
		$_SESSION['id'] = $IDENTIFY;
        if($RESULT['code'] == -1){
            throw new PDOException("SQL Exception");
        }else if($RESULT['code'] == 0){
            $RESULT['data']['msg'] = 'auth ok.';
        }else if($RESULT['code'] == 1){
            $RESULT['data']['msg'] = 'invaild account.';
        }else if($RESULT['code'] == 2){
            $RESULT['data']['msg'] = 'your account expired. please contact admin.';
        }
        $RESULT['data'] = array($RESULT['data']);
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