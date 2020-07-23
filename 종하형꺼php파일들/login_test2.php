<?
  $fp = fopen("member.dat","a+");
  $time = time();
  //구분자를 두어 $data에 값을 저장한다.
  $data = "$_POST[name]*ii*$_POST[id]*ii*$_POST[email]*ii*$_POST[pass]*ii*$_SERVER[REMOTE_ADDR]*ii*$time\r\n";
  fputs($fp, $data);

  fclose($fp);
?>
<script>
  window.alert('회원가입이 완료되었습니다.');
  location.href = 'login.php';
</script>
