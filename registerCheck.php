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

if (!$con) {
    echo "Failed to connect to MySQL: ";
}

$query1 = "select * from user where email = '$email';";
$match1_e = mysqli_query($con, $query1) or die('MySQL query error');
$match2_e = mysqli_fetch_array($match1_e);

if ($match2_e) {
    echo 'error1';
} else {
    $sql = "insert into user values (null, '$username', '$streetAddress', '$city', '$zip', '$email', '$password');";

    $result = mysqli_query($con, $sql) or die('MySQL query error');

    $result1 = mysqli_query($con, "SELECT * FROM user where email ='$email'");

    if ($row = mysqli_fetch_array($result1)) {
        $userId = $row['userId'];
    }

    $user = new User();
    $user->userId = (int) $userId;
    $user->username = $username;
    $user->email = $email;
    $user->password = $password;
    $user->streetAddress = $streetAddress;
    $user->city = $city;
    $user->zip = $zip;
    $_SESSION["user"] = serialize($user);
    echo 'success';
}
mysqli_close($con);
?>