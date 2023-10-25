<?php
session_start();
session_unset();
header("location: /login.php");
session_destroy();
exit;