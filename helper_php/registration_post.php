<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = trim($_POST["username"]) ?? "";
    $email = trim($_POST["email"]) ?? "";
    $password = trim($_POST["password"]) ?? "";
    $emailErrorMassage = "";
    $passwordErrorMassage = "";
    $usernameErrorMassage = "";
    $errorMassage = "";

    if (empty($email)) {
        $emailErrorMassage = "email required";
    }
    if (empty($password)) {
        $passwordErrorMassage = "password required";
    }
    if (strlen($password) < 6) {
        $passwordErrorMassage = "password should be minimum of 6 character";
    }

    if (empty($username)) {
        $usernameErrorMassage = "username required";
    }

    $filename = "userdata.txt";

    if (file_exists($filename)) {
        $readFromFile = file_get_contents($filename);
        $allUser = array();
        $allUser = json_decode($readFromFile, true);
        $isDuplicate = false;
        foreach ($allUser as $singleUser) {
            if ($singleUser['email'] === $email) {
                $isDuplicate = true;
                $emailErrorMassage = "Email already exists";
                break;
            }
        }

        if (empty($emailErrorMassage) && empty($passwordErrorMassage) && empty($usernameErrorMassage) && strlen($password) >= 6 && !$isDuplicate) {
            $password = sha1($password);
            $allUser[] = array("username" => "{$username}", "email" => "{$email}", "password" => "{$password}", "role" => "");
            $jsonEncode = json_encode($allUser);
            file_put_contents($filename, $jsonEncode);
            header("location: /index.php");
        } else {
            $emailErrorMessage = "Email already exists";

        }

    }

}
