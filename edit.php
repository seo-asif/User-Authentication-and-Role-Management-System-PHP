<?php

session_start();
if (!isset($_SESSION["email"])) {
    header("location: /login.php");
} else if ($_SESSION["role"] == "user" || $_SESSION["role"] == "") {
    header("location: /user_page.php");
} else if ($_SESSION["role"] == "manager") {
    header("location: /managerpage.php");
}
if (isset($_GET['id'])) {
    $editUserId = $_GET['id'];
    $fileName = "./userdata.txt";
    if (file_exists($fileName)) {
        $readFile = file_get_contents($fileName);
        $allUser = json_decode($readFile, true);
        foreach ($allUser as $key => $user) {
            $isFound = false;
            if ($user["username"] == $editUserId) {
                $isFound = true;

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $selectedRole = trim($_POST["role"]);

                    $allUser[$key]["role"] = $selectedRole;
                    $jsonFormat = json_encode(array_values($allUser));
                    file_put_contents($fileName, $jsonFormat);
                    header("location: /user_management.php");
                }
                break;
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<body style="background:#008080;">
    <div class="container d-flex flex-column align-items-center justify-content-center w-50" style="height:100vh">
    <h1 class="font-weight-bold mb-5 ">Update User Form</h1>
    <form action="" method="POST" class="w-100">

  <div class="form-group">
    <input type="text" disabled class="form-control" style="color:#B8B8B8;" value="<?php if (isset($user["username"])) {
    echo $user["username"];
}
?>">
</div>
<div class="form-group">
    <input type="text" disabled class="form-control" style="color:#B8B8B8;" value="<?php if (isset($user["email"])) {
    echo $user["email"];
}
?>">
</div>

<div class="form-group">
<select class="form-select"  name="role" >
      <option value="admin" >Admin</option>
      <option value="manager">Manager</option>
      <option value="user" selected >User</option>
    </select>
</div>


  <button type="submit" class="btn btn-primary my-2">Update User</button>

</form>

    </div>
</body>
</body>
</html>
