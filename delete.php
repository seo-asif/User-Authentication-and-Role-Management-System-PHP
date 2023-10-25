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
    $deleteUserId = $_GET['id'];

    $fileName = "./userdata.txt";

    if (file_exists($fileName)) {
        $readFile = file_get_contents($fileName);
        $allUser = json_decode($readFile, true);

        foreach ($allUser as $key => $user) {
            $isFound = false;
            if ($user["username"] == $deleteUserId) {
                $isFound = true;
                unset($allUser[$key]);
                $jsonFormat = json_encode(array_values($allUser));
                file_put_contents($fileName, $jsonFormat);
                header("location: /user_management.php");
                break;

            } else {
                echo "dont found";
            }

        }

    }

}
