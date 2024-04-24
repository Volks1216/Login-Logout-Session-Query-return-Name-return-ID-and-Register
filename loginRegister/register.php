<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center><h1>Register<h1></center>
    <form action="register.php" method="post">
        <center>username<br>
        <input type="text" name="username"><br>
        password<br>
        <input type="password" name="password"><br>
        <input type="submit" name="register" value="register"><br>
        <input type="submit" name="back" value="back"></center>
    </form>
</body>
</html>

<?php
    include("database.php");

    if(isset($_POST["register"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "INSERT INTO credentials (user,password)
        VALUES ('$username','$password')";
        mysqli_query($conn, $sql);
        echo"you are registered!";
        mysqli_close($conn);
    }

    if(isset($_POST["back"])){
        header("Location: index.php");
    }
?>