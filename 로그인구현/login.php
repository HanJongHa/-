<?php 

    $con = myqli_cnnect("db-4ha7m.cdb.ntruss.com","sweetboys","whdgk123!","main_db");
    mysqli_query($con,'SET NAMES utf8');

    $u_id =$_POST["u_id"];
    $u_pw =$_POST["u_pw"];

    $statement = mysqli_prepare($con,"select * from custom_info where u_id=? and u_pw=?");
    mysqli_stmt_bind_param($statement,"ss",$u_id,$u_pw);
    mysqli_stmt_execute($statement);


    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement,$u_id,$u_pw);

    $response = array();
    $response["success"]=true;
    while(mysqli_stmt_fetch($statement)){
        $response["success"]=true;
        $response["u_id"]=$u_id;
        $response["u_pw"]=$u_pw;
    }
    echo json_encode($response);