<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    include("header.html")
    ?>
    <hr>
</head>
<body>
        <main>
            <center><p class="par1">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum dignissimos quia sunt. Numquam officiis aut reprehenderit harum, inventore deleniti illum beatae iste. Labore quod eos enim asperiores, accusamus deserunt similique.
            </center></p><br>

        </main>
        <center><span><?php
        echo "<center>";
        echo $_SESSION["username"];
        ?>

        <form action="home.php" method="post">
        <input type="submit" name="logout" value="logout"></span></center>
        </form>

        <?php
        include("footer.html");
        ?>
</body>
</html>

<?php
    if(isset($_POST["logout"])){
        session_destroy();
        header("Location: index.php");
    }
?>