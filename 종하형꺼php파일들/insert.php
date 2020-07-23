<?php
$conn = mysqli_connect(
  'db-4ha7m.cdb.ntruss.com',
  'sweetboys',
  'whdgk123!',
  'main_db');

mysqli_query($conn, "
    INSERT INTO jhlTable (
        no,
        name,
        pass,
        phone
    ) VALUES (
        '5',
        'tester5',
        NOW(),
        '01044444444'

    )");
?>
