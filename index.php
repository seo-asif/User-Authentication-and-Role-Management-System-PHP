<?php

session_start();

if (!isset($_SESSION["email"])) {
    header("location:/login.php");
}

if ($_SESSION["role"] == "" || $_SESSION["role"] == "user") {
    header("location:/user_page.php");
}

if ($_SESSION["role"] == "manager") {
    header("location:/managerpage.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["logout"])) {
        $_SESSION["loggedin"] == false;
        session_unset();
        session_destroy();
        header("location: /login.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true): ?>
    <?php echo $_SESSION["email"]; ?>
    <?php endif;?>

<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true): ?>
    <form action="" method="POST">
        <div class="form-group">
            <input type="hidden" class="form-control" id="pwd" name="logout">
        </div>
        <button type="submit" class="btn btn-default">Logout</button>
    </form>
    <?php else: ?>
        <p>You are not logged in.</p>
    <?php endif;?>
</body>
</html>
