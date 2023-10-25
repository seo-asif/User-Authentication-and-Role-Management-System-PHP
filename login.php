<?php
session_start();
if (isset($_SESSION["email"])) {
    header("location: /index.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = trim($_POST["email"]) ?? "";
        $password = sha1(trim($_POST["password"])) ?? "";
        $emailErrorMassage = "";
        $passwordErrorMassage = "";
        $errorMassage = "";

        if (empty($email)) {
            $emailErrorMassage = "email required";
        }
        if (empty($password)) {
            $passwordErrorMassage = "password required";
        }

        $filename = "userdata.txt";
        if (file_exists($filename)) {

            $readFromFile = file_get_contents($filename);
            $allUsers = json_decode($readFromFile, true);
            $isFound = false;
            foreach ($allUsers as $user) {

                if ($user["email"] == $email && $user["password"] == $password) {
                    $isFound = true;
                    $_SESSION["loggedin"] = true;
                    $_SESSION["email"] = $user["email"];
                    $_SESSION["role"] = $user["role"];
                    $_SESSION["username"] = $user["username"];

                    header("location: /index.php");
                    break;
                } else {
                    $_SESSION["loggedin"] = false;
                    $emailErrorMassage = "";
                    $passwordErrorMassage = "email and password does not match";

                }
            }

        } else {

            $_SESSION["loggedin"] = false;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background:#008080;">
    <div class="container d-flex flex-column align-items-center justify-content-center w-50" style="height:100vh">
    <h1 class="font-weight-bold mb-5 ">Login to your Account</h1>
    <form action="" method="POST" class="w-100">


  <div class="form-group">
    <label  class="text-white font-weight-bold">Email address</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email">
    <p style="color:#ffe847;font-weight:600;text-shadow:none">
    <?php if (!empty($emailErrorMassage)) {
    echo $emailErrorMassage;}?>
  </p>
    </div>
  <div class="form-group">
    <label class="text-white font-weight-bold mt-1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
    <p style="color:#ffe847;font-weight:600;text-shadow:none">
    <?php if (!empty($passwordErrorMassage)) {
    echo $passwordErrorMassage;}?>
  </p>
  </div>

  <button type="submit" class="btn btn-primary mt-2">Login</button>

  <p>Don't have account?<a style="color:yellow" class="pl-1" href="/registration.php">Registration</a></p>
</form>

    </div>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>