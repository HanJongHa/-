<?php 

    error_reporting(E_ALL); 
    ini_set('display_errors',1); 

    include('dbcon.php');


    if( ($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit']))
    {

        $u_id=$_POST['u_id'];
        $u_pw=$_POST['u_pw'];

        if(empty($u_id)){
            $errMSG = "사용하실 id를 입력하세요.";
        }
        else if(empty($u_pw)){
            $errMSG = "사용하실 pw를 입력하세요.";
        }

        if(!isset($errMSG))
        {
            try{
                $stmt = $con->prepare('INSERT INTO custom_info(u_id, u_pw) VALUES(:u_id, :u_pw)');
                $stmt->bindParam(':u_id', $u_id);
                $stmt->bindParam(':u_pw', $u_pw);

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

<html>
   <body>
        <?php 
        if (isset($errMSG)) echo $errMSG;
        if (isset($successMSG)) echo $successMSG;
        ?>
        
        <form action="<?php $_PHP_SELF ?>" method="POST">
            ID: <input type = "text" name = "u_id" />
            PW: <input type = "text" name = "u_pw" />
            <input type = "submit" name = "submit" />
        </form>
   
   </body>
</html>