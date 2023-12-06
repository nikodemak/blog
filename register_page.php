<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Logowanie</title>
</head>
<body>
    <?php require("header.php") ?>
    <div id="login">
    <form method="POST" action="register.php">
        <input type="text" name="email" id="email" placeholder="e-mail"></br>
        <input type="text" name="username" id="user" placeholder="username"></br>
        <input type="password" name="password" id="pass" placeholder="password">
        <input type="submit" hidden>
    </form>
    </div>
</body>
</html>