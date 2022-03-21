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
        $EDUCATION = NULL;
        $JSON = NULL;

        if(!$DEBUG_MODE){
            $PARAM = $_POST['DataType'];
            if($PARAM = "JSON"){
                $PARAM = json_decode($_POST['data']);
                $IDX = $_SESSION['idx'];
                $EDUCATION = $PARAM->education;
                $JSON = $PARAM->json;
            }else{
                $IDX = $_SESSION['idx'];
                $EDUCATION = $_POST['education'];
                $JSON = $_POST['json'];
            }
        }else{
            $IDX = 3;
            $EDUCATION = 4;
            $JSON = '[{"No":1,"Name":"XXX","Nationality":"XXX","FIN/NRIC":"GXXXXXXXX","Contact No":" 65-XXXX-XXXX","Email":"sample@gsenc.com","Job Position":"Safety Supervisor"},{"No":2,"Name":"XXX","Nationality":"XXX","FIN/NRIC":"GXXXXXXXX","Contact No":" 65-XXXX-XXXX","Email":"sample@gsenc.com","Job Position":"General Worker"}]';
        }
        $INSERT_VALUE = "";
        $R = json_decode($JSON);
        
        $SQL = "INSERT INTO RESERVATIONv3 (`idx`,`education`,`user`,`approve`,`AproveTime`,`ApplyTime`) VALUE (NULL,".$EDUCATION.",".$IDX.",0,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP())";
        $STMT = $PDO->prepare($SQL);
        $STMT->execute();
        
        $RIDX = $PDO->lastInsertId();
        
        foreach ($R as $row) {
            $INSERT_VALUE .= "(NULL,".$RIDX.",".$row->{"No"}.",'".$row->{"Name"}."','".$row->{"Nationality"}."','".$row->{"NRIC / FIN No"}."','".$row->{"Contact No (if any)"}."','".$row->{"Email (if any)"}."','".$row->{"Job Position"}."'),";
        }
        $INSERT_VALUE = substr($INSERT_VALUE , 0, -1);
        $SQLEx = "INSERT INTO STUDENTS (`idx`,`ridx`,`No`,`Name`,`Nationality`,`NRIC / FIN No`,`Contact No (if any)`,`Email (if any)`,`Job Position`) VALUES " . $INSERT_VALUE;
        $STMT = $PDO->prepare($SQLEx);
        $STMT->execute();
        
        $SQLEx2 = "CALL SET_MSGToAdmin(".$IDX.",'".$_SESSION['id']." has applied for training. Please confirm and approve or return it.',@RESULT)";
        $STMT = $PDO->prepare($SQLEx2);
        $STMT->execute();
        
        $RESULT = array();
        $RESULT['code'] = 0;
        $RESULT['data'] = array(array('msg'=>'apply education ok'));

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