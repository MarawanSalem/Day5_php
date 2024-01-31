<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['username'])) {
        echo "<h1>Welcome, " . $_SESSION['username']."</h1>";
    } else {
    echo "Welcome";
        exit();
    }
    if(isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }


if(isset($_SESSION['visit_count'])) {
    $_SESSION['visit_count'] += 1;
} else {
    $_SESSION['visit_count'] = 1;
}

if(isset($_SESSION['username'])) {
    echo "<p>You have visited this page " . $_SESSION['visit_count'] . " times.</p>";
} else {
    echo "Welcome";
    exit();
}

?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <button class="logout" type="submit" name="logout">Logout</button>
    </form>
    <div class="cont" style="text-align:center">
        <img src="friends.png" style="width:25%;" alt="">
    </div>
</body>
</html>
