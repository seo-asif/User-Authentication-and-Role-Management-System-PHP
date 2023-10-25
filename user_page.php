<?php
session_start();
if (!isset($_SESSION["role"])== "user") {
    header("location: /login.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <h1>User page</h1>

<h1>Welcome <?php echo $_SESSION["email"]; ?></h1>
<h1>Welcome <?php echo $_SESSION["role"]; ?></h1>

<a href="logout.php">Logout</a>


</body>
</html>