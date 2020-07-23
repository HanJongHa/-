<?php 

    error_reporting(E_ALL); 
    ini_set('display_errors',1); 

    include('dbcon.php'); // db에 연결을 하는코드


    $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");


    if( (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit'])) || $android )
    {

        // 안드로이드 코드의 postParameters 변수에 적어준 이름을 가지고 값을 전달 받습니다.

        $u_id=$_POST['u_id'];   //안드로이드에서 u_id값을 전달해줌
        $u_pw=$_POST['u_pw']; //안드로이드에서 u_pw값을 전달해줌

        if(empty($u_id)){
            $errMSG = "사용하실 id를 입력하세요.";
        }
        else if(empty($u_pw)){
            $errMSG = "사용하실 pw를 입력하세요.";
        }

        if(!isset($errMSG)) // id와 pw 모두 입력이 되었다면 
        {
            try{
                // SQL문을 실행하여 데이터를 MySQL 서버의 person 테이블에 저장합니다. 
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


<?php 
    if (isset($errMSG)) echo $errMSG;
    if (isset($successMSG)) echo $successMSG;

   $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
   
    if( !$android )
    {
?>
    <html>
       <body>
            <!-- 안드로이드를 통해서 값을 전달해주는 것임 -->
            <form action="<?php $_PHP_SELF ?>" method="POST">
                ID: <input type = "text" name = "u_id" />
                PW: <input type = "text" name = "u_pw" />
                <input type = "submit" name = "submit" />
            </form>
       
       </body>
    </html>

<?php 
    }
?>