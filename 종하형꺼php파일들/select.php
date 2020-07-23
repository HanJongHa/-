<?php
$conn = mysqli_connect(
  'db-4ha7m.cdb.ntruss.com',
  'sweetboys',
  'whdgk123!',
  'main_db');
    
//행이 하나일때 이렇게 씀
$sql = "SELECT * FROM jhlTable where no = 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo '<h1>'.$row['name'].'</h1>';
echo $row['phone'];

$sql = "SELECT * FROM jhlTable";
$result = mysqli_query($conn, $sql);
    
while($row = mysqli_fetch_array($result)) {
    
    echo '<h1>'.$row['name'].'</h1>';
    echo $row['phone'];
    echo $row['no'];
    echo $row['pass'];
}
