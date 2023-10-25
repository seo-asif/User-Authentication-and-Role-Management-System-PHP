<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("location: /login.php");
}

if ($_SESSION["role"] == "user") {
    header("location: /user_page.php");
}
if ($_SESSION["role"] == "manager") {
    header("location: /managerpage.php");
}

$file = "./userdata.txt";

$readData = file_get_contents($file);
$allUsers = json_decode($readData, true);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>


    <div class="container">

        <div class="card my-5 p-2" style="
    background: #f1f1f1;
">
            <h2><?php echo $_SESSION["username"]; ?>'s only access</h2>
            <div class="d-flex align-items-center justify-content-end  ">
                <a href="index.php" class="btn btn-info mr-2" role="button">back to Dashboard</a>
                <a href="logout.php" class="btn btn-warning ">Logout</a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>User Roll Management System</h4>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <div class="d-flex align-items-center justify-content-between pb-3">
                        <h4>All Users</h4>
                        <a href="./admin/create.php" class="btn bg-primary text-white ">Create user</a>
                    </div>

                    <thead>
                        <tr>
                            <th scope="col">username</th>
                            <th scope="col">email</th>
                            <th scope="col">role</th>
                            <th scope="col">action</th>
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
    echo "<td> button</td>";
    // echo "<td><a href='/admin/edit.php?id={$value[3]}' class='btn btn-sm btn-outline-primary mr-2'>Edit</a><a href='/admin/delete.php?id={$value[3]}' class='btn btn-sm btn-outline-danger'>Delete</a></td>
    //                     </tr>";
}
?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

</html>

