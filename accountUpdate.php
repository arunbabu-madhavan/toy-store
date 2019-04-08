<?php
// include "User.php";
class User{
    var $userId;
    var $username;
    var $email;
    var $password;
    var $streetAddress;
    var $city;
    var $zip;
}
session_start();

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$streetAddress = $_POST["streetAddress"];
$city = $_POST["city"];
$zip = $_POST["zip"];

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "toystore"; //databaseName

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

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

    $_SESSION["user"] = serialize($user);
    echo 'success';

mysqli_close($con);
?>