<?php
    error_reporting(E_ALL); 
    ini_set('display_errors',1); 

    include('dbcon.php'); // db에 연결을 하는코드
    //$con = mysqlli_connect('db-4ha7m.cdb.ntruss.com','sweetboys','whdgk123!','main_db');

    $u_id = $_POST["u_id"];
    $u_pw = $_POST["u_pw"];

    $statement = mysqli_prepare($con,"select * from custom_info where u_id=? and u_pw=?");
    mysqli_stmt_bind_param($statement,"ss",$u_id,$u_pw);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement,$u_id,$u_pw);

    $response = array();
    $response["success"]=false;

    while(mysqli_stmt_fetch($statement)){
        $response["success"]=true;
        $response["u_id"]=$u_id;
        $response["u_pw"]=$u_pw;
    }
    echo json_encode($response);
    ?>
