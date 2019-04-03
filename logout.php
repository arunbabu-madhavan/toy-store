<?php
session_start();
session_reset();  //undo session var
session_unset();   //unset all session var
session_destroy();   //actually destroy session var
header("Location: index.php");
exit();
?>