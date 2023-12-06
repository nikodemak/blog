<?php
require("dbconn.php");
session_start();
if(!isset($_SESSION["authenticated"]) || !$_SESSION["authenticated"]) {
    header("Location: .");
    exit();
}
if (isset($_REQUEST["title"]) && isset($_REQUEST["content"])) {
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$check = getimagesize($_FILES["img"]["tmp_name"]);
if($check !== false) {
  $uploadOk = 1;
} else {
  $uploadOk = 0;
}
if ($uploadOk != 0) {
    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
    $query = $conn->prepare("INSERT INTO `articles`(`epoch`, `author`, `title`, `image`, `text`) VALUES (?, ?, ?, ?, ?)");
    $id = $_SESSION["credentials"]["ID"];
    $title = $_REQUEST["title"];
    $content = $_REQUEST["content"];
    $epoch = time();
    $query->bind_param("iisss", $epoch, $id, $title, $target_file, $content); 
    $query->execute();
}
}
header("Location: add_page.php");
exit();
?>