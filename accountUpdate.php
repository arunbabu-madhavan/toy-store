<?php
// include "User.php";
class User{
    var $userId;
    var $email;
    var $password;
    // var $rank;
}
session_start();

$userId= $_POST['userId'];
$email = $_POST["email"];
$password = $_POST["password"];
// $rank = $_POST['rank'];

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "toystore"; //databaseName

$con = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

if (!$con)
{
    echo "Failed to connect to MySQL: ";
}


    $sql = "update user set password = '$password' where userId = $userId";

    $result = mysqli_query($con,$sql) or die('MySQL query error');
    $user = new User();
    $user->userId = (int) $userId;
    $user->email = $email;
    $user->password = $password;
    // $user->rank =$rank;
    $_SESSION["user"] = serialize($user);
    echo 'success';

mysqli_close($con);
?>