<?php
    header("Content-Type: text/html;charset=UTF-8");
    $conn = mysqli_connect("db-4ha7m.cdb.ntruss.com","sweetboys","whdgk123!","main_db");
    $data_stream = "'".$_POST['Data1']."','".$_POST['Data2']."','".$_POST['Data3']."'";
    $query = "insert into jsy(Data1,Data2,Data3) values (".$data_stream.")";
    $result = mysqli_query($conn, $query);
     
    if($result)
      echo "1";
    else
      echo "-1";
     
    mysqli_close($conn);
?>

