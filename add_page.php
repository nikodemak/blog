<?php
session_start();
if(!isset($_SESSION["authenticated"]) || !$_SESSION["authenticated"]) {
    header("Location: .");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_Page</title>
</head>
<body>
<?php require("header.php") ?>
<div id="upload">
    <form method="POST" enctype="multipart/form-data" action="add.php">
        <input type="text" name="title" id="title"></br>
        <input type="file" name="img" id="img" placeholder="image"></br>
        <input type="text" name="content" id="content">
        <input type="submit">
    </form>
    </div>
</body>
</html>