<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&family=Signika:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body class="register_body">

    <div class="topnav">
        <a href="login.php">Back to Login</a>
        <a href= "pre-index.php" class="active">Home</a>          
    </div>

    <div class="container-register">
        <div class="register">

            <img class= "ucf-logo" src="images/ucf.png" alt="Unity Christian Fellowship Logo">

            <h3>Register Form</h3>

            <form action="process-signup.php" method="post" name="register" id="register" novalidate>
                <input required class="customInput" type="text" name="firstname" placeholder="First Name"> 
                <input required class="customInput" type="text" name="middlename" placeholder="Middle Name"><br><br>
                <input required class="customInput" type="text" name="lastname" placeholder="Last Name"> <br> <br>
                <input required class="customInput" type="text" name="contact" placeholder="Contact Number"> 
                <input required class="customInput" type="number" name="age" placeholder="Age" min="0"> <br> <br>
                <input required class="customAddressInput" type="text" name="user_address" placeholder="Address">
                <h5>*Input the desired information to use</h5>
                <input required class="customInput" type="text" name="email" placeholder="Email">
                <br>
                <h5>Password must be atleast 8 characters long, with atleast 1 letter or number.</h5>
                <input required class="customInput" type="password" name="pwd" placeholder="Password"> 
                <input required class="customInput" type="password" name="confirm_pwd" placeholder="Confirm Password">
                <br><br>
                <button type="submit" name="submit" class="customButton"> Submit </button>
            </form>
        </div>
    </div>
</body>
</html>