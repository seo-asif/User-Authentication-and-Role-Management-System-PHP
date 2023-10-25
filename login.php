<?php
require_once "./helper_php/login_post.php";
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

  <button type="submit" class="btn btn-primary my-2">Login</button>

  <p>Don't have account?<a style="color:yellow" class="pl-1" href="/registration.php">Registration</a></p>
</form>
        <div class="card " style="background: #00000014;">
        <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th> Email</th>
                        <th> Password</th>
                        <th> Role</th>
                    </thead>
                    <tbody>
                    <tr>
                            <td scope="col">admin@gmail.com</td>
                            <td scope="col">admin123456</td>
                            <td scope="col">admin</td>

                        </tr>
                        <tr>
                            <td scope="col">rayhan@gmail.com</td>
                            <td scope="col">123456</td>
                            <td scope="col">User</td>

                        </tr>
                    </tbody>
                    </table>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>