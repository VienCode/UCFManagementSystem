<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: pre-index.php");
    exit;
}

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM users WHERE id = {$_SESSION["user_id"]}";
$result = $mysqli->query($sql);
$user = $result->fetch_assoc();

#print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&family=Signika:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Unity Christian Fellowship</title>
</head>
<body class="index_body">
    <div class="welcome">
        <div class="topnav">
            <a href="logout.php">Logout</a> 
            <a href="#contact">Contact Us</a> 
        </div>

        <?php if (isset($user)): ?>

            <div class="welcome_text">
                <h1> Hello,<?= htmlspecialchars($user["firstname"] . " " . $user["lastname"]) ?> </h1>
            </div>
        <?php else: ?>    
            header("Location: pre-index.php");
        <?php endif ?>    

        <div class="button_container">
            <button class="customButton">ABOUT US</button>
            <button class="customButton">WHERE TO FIND US</button>
        </div>
    </div>
</body>
</html>