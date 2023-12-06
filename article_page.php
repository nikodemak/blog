<?php 
session_start();
require("dbconn.php");
if (!isset($_REQUEST["ID"])) {
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
    <link rel="stylesheet" href="css/article.css">
    <title>Blog</title>
</head>
<body>
    <?php require("header.php") ?>
    <div id="articles">
        <?php 
        $query = $conn->prepare("SELECT `title`, `text`, `image` FROM `articles` WHERE `ID` = ?");
        $query->bind_param("i", $_REQUEST["ID"]);
        $query->execute();
        $res = $query->get_result();
        while($data = $res->fetch_assoc())
        {
        ?>
        <div class="article">
            <img src="<?php echo $data["image"] ?>">
            <h2><?php echo $data["title"] ?></h2>
            <p><?php echo $data["text"] ?></p>
        </div>
        <?php } ?>
    </div>
</body>
</html>