<?php
    include "service/user_database.php";
    session_start();

    $login_message = "";

    if(isset($_SESSION["is_login"])) {
        header("location: dashboard.php");
    }

    if(isset($_POST['login_button'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hash_password = hash('sha256', $password);
            
            $sql = "SELECT * FROM user WHERE username='$username' 
            AND password='$hash_password'";

            $result = $db->query($sql);

            if($result->num_rows > 0) {
                $data = $result->fetch_assoc();
                $_SESSION["username"] = $data["username"];
                $_SESSION["is_Login"] = true;

                header("location: dashboard.php");

            }else {
                $login_message = "username atau passwordmu salah!, silahkan coba lagi atau daftar dulu!";
            }
            $db->close();
        }

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style> <?php include 'login.css'; ?> </style>
</head>
<body>
    <?php include "Layout/header.html" ?>

    <h2>Yuk masuk akunmu!</h2>
    <i><?= $login_message ?></i>
    

    <form action="login.php" method="POST">
        <input type="Text" placeholder="username" name="username"/>
        <input type="Text" placeholder="password" name="password"/>
        <button type="Submit" name="login_button">Masuk sekarang</button>
    </form>

    <?php include "Layout/footer.html" ?>
</body>
</html>