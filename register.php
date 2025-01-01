<?php
    include "service/user_database.php";
    session_start();

    if(isset($_SESSION["is_login"])) {
        header("location: dashboard.php");
    }
    $register_message = "";

    if(isset($_POST["register_button"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hash_password = hash("sha256", $password);

        try {
            $sql = "INSERT INTO user (username, password) VALUES ('$username', '$hash_password')";

            if($db->query($sql)) {
                $register_message = "Berhasil, datamu sudah tercatat";
            }else {
                $register_message = "Gagal, coba lagi..";
            }
        }catch (mysqli_sql_exception) {
            $register_message = "username sudah digunakan";
        }
        $db->close();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <style> <?php include 'register.css'; ?> </style>

</head>
<body>
    <?php include "Layout/header.html" ?>

    <h2>Daftar dulu yuk!</h2>
    <i><?= $register_message ?></i>
    
    <form action="register.php" method="POST">
        <input type="Text" placeholder="username" name="username"/>
        <input type="Text" placeholder="password" name="password"/>
        <button type="Submit"name="register_button">daftar sekarang</button>
    </form>

    <?php include "Layout/footer.html" ?>

</body>
</html>