<?php 
    include("database.php");
    session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

        <center><h1>Welcum to Fakebook!<h1></center>

    <center><form action="index.php" method="post">
    username<br>
    <input type="text" name="username"><br>
    password<br>
    <input type="password" name="password"><br>
    <input type="submit" name="login" value="login"><br>
    <input type="submit" name="register" value="register"><br><br></center>

    <center>search names<br>
    <input type="text" name="searchname"><br>
    <input type="submit" name="search" value="search"><br></center>
    </form>

</body>
</html>

<?php
    if(isset($_POST["search"])){
        $searchname = $_POST["searchname"];

        $sql1 = "SELECT * FROM credentials 
        WHERE user='$searchname'";

        $sql2 = "SELECT * FROM credentials 
        WHERE user='$searchname' ";

        $result1 = mysqli_query($conn,$sql1);
        $result2 = mysqli_query($conn,$sql2);

        if(mysqli_fetch_all($result1)){
            echo "<center>";
            echo "name found {$searchname}";

            if(mysqli_num_rows($result2)){
                $row = mysqli_fetch_assoc($result2);
                    echo "<center>";
                    echo "<br>";
                    echo "with an ID# of: ";
                    print_r($row["id"]);
            }

            }
            else{
            echo "<center>";
            echo "no such '{$searchname}' user has been found";
        }

    }

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["username"];

        $sql = "SELECT * FROM credentials 
        WHERE user='$username' AND password='$password' ";

        $result = mysqli_query($conn, $sql);

        if(mysqli_fetch_all($result)){
            if($username || $password ==true){
                header("Location: home.php");
                echo $_POST["username"];
            }
        }else{
            echo "<br>","<center>";
            echo"username/password does not match";
        }

    }

    if(isset($_POST["register"])){
        header("Location: register.php");
    }
    mysqli_close($conn);
?>