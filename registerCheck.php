<?php
$name = $_POST["username"];
$email = $_POST["email"];
$pass = $_POST["password"];
$streetAddress = $_POST["streetAddress"];
$city = $_POST["city"];
$zip = $_POST["zip"];

include 'dbconfig.php';

$con = mysqli_connect("$serverName:$port",$username,$password);
mysqli_select_db($con,$databaseName);

if (!$con) {
    echo "Failed to connect to MySQL: ";
}

$query1 = "select * from user where email = '$email';";
$match1_e = mysqli_query($con, $query1) or die('MySQL error1');
$match2_e = mysqli_fetch_array($match1_e);

$hashPassword = hash('sha256',$pass);
if ($match2_e) {
    echo 'duplicate_error';
} else {
    $sql = "insert into user (`userId`, `username`, `streetAddress`, `city`, `zip`, `email`, `password`)
                         values (null, '$name', '$streetAddress', '$city', '$zip', '$email', '$hashPassword');";
   
    $roleSql = "";
    $result = mysqli_query($con, $sql) or die('MySQL error2');

    $result1 = mysqli_query($con, "SELECT * FROM user where email ='$email'");

    if ($row = mysqli_fetch_array($result1)) {
        $userId = $row['userId'];
    }

    $sql = "insert into roleUser (`roleId`,`userId`)
    values (2, '$userId');";

    $result = mysqli_query($con, $sql) or die('MySQL error');

    echo 'success';
}
mysqli_close($con);
?>