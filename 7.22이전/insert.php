<html>
   <body>
        <?php 
        if (isset($errMSG)) echo $errMSG;
        if (isset($successMSG)) echo $successMSG;
        ?>
        
        <form action="<?php $_PHP_SELF ?>" method="POST">
            userid: <input type = "text" userid = "userid" />
            pw: <input type = "text" pw = "pw" />
            <input type = "submit" name = "submit" /> <!-- 에매하지만 나둬본다 안되면 이줄탓-->
        </form>
   
   </body>
</html>
<?php 

    error_reporting(E_ALL); 
    ini_set('display_errors',1); 

    include('dbcon.php');


    if( ($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit']))
    {

        $userid=$_POST['userid'];
        $pw=$_POST['pw'];

        if(empty($userid)){
            $errMSG = "id입력하세요.";
        }
        else if(empty($pw)){
            $errMSG = "사용하실 비밀번호를 입력하세요.";
        }

        if(!isset($errMSG))
        {
            try{
                $stmt = $con->prepare('INSERT INTO jongha(userid, pw) VALUES(:userid, :pw)');
                $stmt->bindParam(':userid', $userid);
                $stmt->bindParam(':pw', $pw);

                if($stmt->execute())
                {
                    $successMSG = "새로운 사용자를 추가했습니다.";
                }
                else
                {
                    $errMSG = "사용자 추가 에러";
                }

            } catch(PDOException $e) {
                die("Database error: " . $e->getMessage()); 
            }
        }

    }
?>

