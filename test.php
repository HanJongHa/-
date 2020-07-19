<?php

      $con = mysqli_connect("10.41.2.58","sweetboys", "whdgk123!","main_db");




      $statement =  mysqli_prepare($con, "INSERT INTO report1 VALUES(?,?,?,?)");
      mysqli_stmt_bind_param($statement, "ssss",$library_seat_1, $date_1, $time_1, $content_1 );
      mysqli_stmt_execute($statement);

      $response = array();
      $response["success"] = true;


      echo json_encode($response);

  ?>
