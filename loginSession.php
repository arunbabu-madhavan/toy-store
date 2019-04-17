<?php
session_start();
include 'dbconfig.php';

//Connect to mysql server
$conn = mysqli_connect("$serverName:$port",$username,$password);

if(mysqli_connect_errno()){
  die("Databse connection failed".mysqli_connect_error());
}
//Select database
mysqli_select_db($conn,$databaseName);
//Construct the query
$hashPassword = hash('sha256',$_POST['password']);
$query = "SELECT * FROM User INNER JOIN roleUser
ON User.userId = roleUser.userId
INNER JOIN role
ON role.roleId = roleUser.roleId WHERE email = '".$_POST['email']."' AND password = '$hashPassword'";

//connect to db
$result = mysqli_query($conn,$query);
$user = mysqli_fetch_assoc($result);

if($user == false){
  //echo $query;
  $_SESSION['wrongLoginInfo'] = true;
  header("location: login.php");
  die();
}
else{
  //if user exist, set session username and email
  $_SESSION['wrongLoginInfo'] = false;
  $_SESSION['userId'] = $user['userId'];
  $_SESSION['userName'] = $user['username'];
  $_SESSION['email'] = $user['email'];
  $_SESSION["isAdmin"] = $user['roleId'] == 1 ? true : false;
  header("location: index.php");
  die();
}
?>