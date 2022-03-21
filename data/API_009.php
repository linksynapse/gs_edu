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
        $NAME = NULL;
        $PASSWORD = NULL;
        $NRIC = NULL;
        $EMAIL = NULL;
        $PHONE = NULL;
        $LEVEL = 10;

        if(!$DEBUG_MODE){
            $PARAM = $_POST['DataType'];
            if($PARAM = "JSON"){
                $PARAM = json_decode($_POST['data']);
                $IDENTIFY = $PARAM->identify;
                $NAME = $PARAM->name;
                $PASSWORD = $PARAM->password;
                $NRIC = $PARAM->nric;
                $EMAIL = $PARAM->email;
                $PHONE = $PARAM->phone;
            }else{
                $IDENTIFY = $_POST['identify'];
                $NAME = $_POST['name'];
                $PASSWORD = $_POST['password'];
                $NRIC = $_POST['nric'];
                $EMAIL = $_POST['email'];
                $PHONE = $_POST['phone'];
            }
        }else{
            $IDENTIFY = "administrator";
            $NAME = "administrator";
            $PASSWORD = "ptwa200103420";
            $NRIC = "S5555742Z";
            $EMAIL = "kailnet120@linksynapse.com";
            $PHONE = "8210-4470-2804";
            $LEVEL = 0;
        }
        
        $SQL = 'CALL CREATE_USER(:in_identify,:in_name,:in_password,:in_nric,:in_email,:in_phone,:in_level,@RESULT)';
        $STMT = $PDO->prepare($SQL);
        $STMT->bindParam(':in_identify',$IDENTIFY,PDO::PARAM_LOB);
        $STMT->bindParam(':in_name',$NAME,PDO::PARAM_LOB);
        $STMT->bindParam(':in_password',$PASSWORD,PDO::PARAM_LOB);
        $STMT->bindParam(':in_nric',$NRIC,PDO::PARAM_LOB);
        $STMT->bindParam(':in_email',$EMAIL,PDO::PARAM_LOB);
        $STMT->bindParam(':in_phone',$PHONE,PDO::PARAM_LOB);
        $STMT->bindParam(':in_level',$LEVEL,PDO::PARAM_INT);
        $STMT->execute();
        
        $IDX = $PDO->lastInsertId();
        
        $SQLEx2 = "CALL SET_MSGToAdmin(".$IDX.",'".$IDENTIFY." has create account. Please confirm and approve or return it.',@RESULT)";
        $STMT = $PDO->prepare($SQLEx2);
        $STMT->execute();

        $SQL = 'SELECT @RESULT AS RESULT ';
        $STMT = $PDO->prepare($SQL);
        $STMT->execute();

        $RESULT = array();
        $RESULT['code'] = $STMT->fetch(PDO::FETCH_ASSOC)['RESULT'];
        if($RESULT['code'] != 0){
            $RESULT['data'] = array(array('msg'=>'throw sql exception'));
        }else{
            $RESULT['data'] = array(array('msg'=>'create user ok'));
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