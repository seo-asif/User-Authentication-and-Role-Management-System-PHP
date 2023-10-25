<?php
session_start();
if (!isset($_SESSION["role"])) {
    header("location: /login.php");
}
if ($_SESSION["role"] == "user" || $_SESSION["role"] == "") {
    header("location: /user_page.php");
}
if ($_SESSION["role"] == "admin") {
    header("location: /index.php");
}
$file = "./userdata.txt";
if (file_exists($file)) {
    $readData = file_get_contents($file);
    $allUsers = json_decode($readData, true);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h2>Manager Dashboard</h2>
            </div>

            <div class="card-body">
                <h3>Welcome <?php echo $_SESSION["username"]; ?></h3>
                <h5>Email: <?php echo $_SESSION["email"]; ?></h5>
                <h5>Role: <?php echo $_SESSION["role"]; ?></h5>
                <a href="logout.php" class="btn btn-warning mr-2" role="button">Logout</a>

            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
                <h4>View all user</h4>
            </div>

            <div class="card-body mb-5">
                <table class="table table-bordered text-center">
                    <div class="d-flex align-items-center justify-content-between pb-3">
                        <h4>All Users</h4>
                    </div>

                    <thead>
                        <tr class="bg-info">
                            <th scope="col">username</th>
                            <th scope="col">email</th>
                            <th scope="col">role</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php

foreach ($allUsers as $user) {

    echo "<tr>";
    echo "<td>{$user["username"]}</td>";
    echo "<td>{$user["email"]}</td>";
    if (empty($user["role"])): ?>
        <td>N/A</td>
    <?php else: ?>
        <td><?php echo $user["role"]; ?></td>
    <?php endif;

}
?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

</html>