<?php
require("dbconn.php");
session_start();
header("Location: .");
if (isset($_REQUEST["password"])) {
    if (isset($_REQUEST["username"])) {
        $query = $conn->prepare("SELECT * FROM `users` where username=?");
        if (mysqli_errno($conn) != 0) {
            echo(mysqli_error($conn));
        }
        $query->bind_param("s", $_REQUEST["username"]);
    } elseif(isset($_REQUEST["email"])) {
        if (!filter_var($_REQUEST["email"], FILTER_VALIDATE_EMAIL)) {
            echo("Invalid email format");
            http_response_code(201);
            exit();
        }
        $query = $conn->prepare("SELECT * FROM `users` where email=?");
        $query->bind_param("s", $_REQUEST["email"]);
    }
    $query->execute();
    $result = $query->get_result();
    if (mysqli_num_rows($result) != 1) {
        echo("invalid credentials");
        http_response_code(201);
        exit();
    } else {
        $res = $result->fetch_assoc();
        $pass = $res["passhash"];
        if (password_verify($_REQUEST["password"], $pass)) {
            $_SESSION["authenticated"] = true;
            $_SESSION["credentials"] = $res;
            $_SESSION["credentials"]["passhash"] = null;
            setcookie("loggedIn", "true");
            echo("logged in");
            exit();
        } else {
            echo("invalid credentials");
            http_response_code(201);
            exit();
        }
    }
}
?>