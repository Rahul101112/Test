
<?php
require('constant.php');
$conn = new mysqli(constant("HOST_NAME"), constant("DB_USER"), constant("DB_PASSWORD"), constant("DB_NAME"));
if ($conn->connect_error) {
  die("Couldn't connect to SQL Server on");
}
?>