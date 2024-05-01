<?php
include "connection.php";

$id= $_GET['id'];


$sql = "DELETE FROM `info` WHERE id={$id}";
$result=mysqli_query($conn,$sql) or die("Query unsuccesfull");


header("Location:index.php");
mysql_close($conn);

$conn->close();



?>