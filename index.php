<?php 
session_start();
require("dbconn.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Blog</title>
</head>
<body>
    <?php require("header.php") ?>
    <div id="articles">
        <?php 
        $query = $conn->prepare("SELECT `ID`, `title`, `text`, `image` FROM `articles` ORDER BY `epoch` DESC LIMIT 5");
        $query->execute();
        $res = $query->get_result();
        while($data = $res->fetch_assoc())
        {
        ?>
        <div class="article">
            <a href="article_page.php?ID=<?php echo($data["ID"]); ?>"> <img  src="<?php echo $data["image"] ?>"></a>
            <h2><?php echo $data["title"] ?></h2>
            <p><?php echo $data["text"] ?></p>
        </div>
        <?php } ?>
    </div>
</body>
</html>