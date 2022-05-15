<?php
define ('ROOT', 'http://localhost');
define ('DB_HOST', 'localhost');
define ('DB_USER', 'admin');
define ('DB_PASS', 'root');
define ('DB_NAME', 'web_portal');

$conn = mysqli_connect(DB_HOST,DB_USER ,DB_PASS , DB_NAME);

if (mysqli_error($conn)){
  echo "ERROR".mysqli_connect_errno();
}

 ?>
