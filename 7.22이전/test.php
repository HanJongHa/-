<?php
    $con = mysqli_connect("10.41.2.58","sweetboys", "whdgk123!", "main_db");
    $result = mysqli_query($con, "SELECT * FROM account_info");
    $response = array();


    while($row = mysqli_fetch_array($result)){
       array_push($response, array("a"=>$row[0],"b"=>$row[1],"c"=>$row[2],"d"=>$row[3]));
    }


    echo json_encode(array("response"=>$response));
    mysqli_close($con);
?>
