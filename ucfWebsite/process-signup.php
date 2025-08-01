<?php

if (empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["middlename"]) || empty($_POST["contact"]) || empty($_POST["age"]) || empty($_POST["user_address"]) || empty($_POST["email"]) || empty($_POST["pwd"]) || empty($_POST["confirm_pwd"])) {
    echo "<script>
        alert('Please fill in all of the fields');
        window.location.href = 'register.php';
    </script>";
    die();
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    echo "<script>
        alert('Invalid Email Address');
        window.location.href = 'register.php';
    </script>";
    die();
}


if (strlen($_POST["pwd"]) < 8) {
    echo "<script>
        alert('Password must have atleast 8 characters.');
        window.location.href = 'register.php';
    </script>";
    die();
}

if (!preg_match("/[a-z]/i", $_POST["pwd"])) {
    echo "<script>
        alert('Password must contain atleast 1 letter');
        window.location.href = 'register.php';
    </script>";
    die();
}

if (!preg_match("/[0-9]/", $_POST["pwd"])) {
    echo "<script>
        alert('Password must contain atleast 1 number');
        window.location.href = 'register.php';
    </script>";
    die();
}

if (!preg_match("/^09\d{9}$/", $_POST["contact"])) {
    echo "<script>
        alert('Invalid contact number!\\nFormat: 09XXXXXXXXX\\nExample: 09171234567');
        window.location.href = 'register.php';
    </script>";
    exit();
}

if ($_POST["pwd"] !== $_POST["confirm_pwd"]) {
    echo "<script>
        alert('Password does not match');
        window.location.href = 'register.php';
    </script>";
    die();
}

$pwd_hash = password_hash($_POST["pwd"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$check_sql = "SELECT email FROM users WHERE email = ?";
$check_stmt = $mysqli->prepare($check_sql);
$check_stmt->bind_param("s", $_POST["email"]);
$check_stmt->execute();
$result = $check_stmt->get_result();

if ($result->num_rows > 0) {
    echo "<script>
        alert('Email already taken! Please use a different email address.');
        window.location.href = 'register.php';
    </script>";
    exit;
}

$sql = "INSERT INTO users (firstname, middlename, lastname, contact, age, user_address, email, pwd_hash)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssssisss",
                    $_POST["firstname"],
                    $_POST["middlename"],
                    $_POST["lastname"],
                    $_POST["contact"],
                    $_POST["age"],
                    $_POST["user_address"],
                    $_POST["email"],
                    $pwd_hash);

if ($stmt->execute()) {
    
    header("Location: login.php");
    exit;

} else {
    if ($mysqli->errno === 1062){
        die("Email already taken");
    } else {
        die("Error: " . $mysqli->error);
    }
}