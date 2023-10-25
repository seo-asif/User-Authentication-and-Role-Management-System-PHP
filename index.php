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
// if (!$_SESSION["role"] == "admin") {
//     header("location:/index.php");
// }

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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
        <h2>Admin Dashboard</h2>
    </div>

    <div class="card-body">
            <h3>Welcome <?php echo $_SESSION["username"]; ?></h3>
        <h5>Email: <?php echo $_SESSION["email"]; ?></h5>
        <h5>Role: <?php echo $_SESSION["role"]; ?></h5>
        <a href="logout.php" class="btn btn-warning mr-2" role="button">Logout</a>
<a href="user_management.php" class="btn btn-info mr-2" role="button">User Management</a>

        </div>
        </div>

</div>
</body>
</html>
