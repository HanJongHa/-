<html>

<body>회원정보가 등록되었습니다.</body>

</html>
<?php
$conn = mysqli_connect("db-4ha7m.cdb.ntruss.com", "sweetboys", "whdgk123!", "main_db");
mysql_set_charset('utf8',$conn);
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");
mysql_query("set names utf8");
$id=$_POST['id'];
$password=md5($_POST['pwd']);
$password2=$_POST['pwd2'];
$name=$_POST['name'];
$email=$_POST['email'];
$sql  = "
    INSERT INTO account_info (
        id,
        pwd,
        name,
        email
    ) VALUES (
        '$id',
        '$password',
        '$name',
        '$email'
    )";
$result = mysqli_query($conn, $sql);
if($result === false){
    echo mysqli_error($conn);
}
?>