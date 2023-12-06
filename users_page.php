<?php 
session_start();
require("dbconn.php");
if(!isset($_SESSION["authenticated"]) || !$_SESSION["authenticated"] || $_SESSION["credentials"]["ID"] != 0) {
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
    <link rel="stylesheet" href="css/users.css">
    <title>Blog Archive</title>
</head>
<body>
    <?php require("header.php") ?>
    <div id="users">
        <?php 
        $query = $conn->prepare("SELECT `ID`, `username`, `email` FROM `users` ORDER BY `ID` DESC");
        $query->execute();
        $res = $query->get_result();
        while($data = $res->fetch_assoc())
        {
        ?>
        <div class="user">
            <?php echo "ID:  " . $data["ID"] . "  username:  " . $data["username"] . "  email:  " . $data["email"] ?>
        </div>
        <?php } ?>
    </div>
</body>
</html>