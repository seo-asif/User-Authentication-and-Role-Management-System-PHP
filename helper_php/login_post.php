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
