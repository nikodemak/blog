<?php
session_start();
$_SESSION["authenticated"] = false;
$_SESSION["credentials"] = null;
unset($_SESSION["credentials"]);
setcookie("loggedIn", "false");
header("Location: .");
exit();
?>