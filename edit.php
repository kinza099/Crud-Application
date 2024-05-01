<?php
include "connection.php";

echo $id= $_GET['id'];
if(isset($_POST["update"])){

    echo "<br><br><br>";
    echo $name=$_POST["name"];
    echo $email=$_POST["email"];
    echo $pass=$_POST["password"];
    echo $phone=$_POST["phone_number"];
  
  
  $sql = "UPDATE `info` SET `name`='$name',`email`='$email',`password`='$pass',`phone`='$phone' WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location:index.php"); 
  } else {
    echo "Error updating record: " . $conn->error;
  }

  $conn->close();
  
  }






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
    <!-- Image and text -->
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    <i class="fa-solid fa-code"></i> Crud Application
  </a>
  <nav class="nav text-white">
  <a class="nav-link text-white" href="index.php"><i class="fa-sharp fa-solid fa-house mr-1"></i>Home</a>
  <a class="nav-link text-white" href=""><i class="fa-sharp fa-solid fa-user-plus mr-1"></i>Add User</a>
  <a class="nav-link text-white" href="#"><i class="fa-sharp fa-solid fa-globe mr-1"></i>About</a>
  <a class="nav-link text-white" href="#"><i class="fa-sharp fa-solid fa-envelope mr-1"></i>Contact</a>
</nav>
</nav>
 
<div class="container">
<div style="margin-top:100px; margin-left:50px; margin-right:100px; margin-bottom: 60px;">
    <div class="text-center navbar-dark bg-dark text-white" style="height:50px; padding-top:9px; margin-bottom: 25px;"><h3>Update</h3></div>
    <form class="post-form" action="" method="post">
    <?php

    $sql = "SELECT * FROM `info` WHERE id={$id}";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {?>
    <div class="form-group">
        <label for="exampleInputName">Name</label>
        <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby="nameHelp" value="<?php echo $row['name']?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email </label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="<?php echo $row['email']?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $row['password']?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPhone">Phone Number</label>
        <input type="text" class="form-control" id="exampleInputPhone" name="phone_number" value="<?php echo $row['phone']?>">
    </div>
    <button type="submit" class="btn btn-primary" name="update">Update</button>
    <?php
      }}?>
    </form>
</div>
</div>
    
</body>
</html>