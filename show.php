<?php

$filename = "userdata.txt";

$read_from_file = file_get_contents($filename);
// echo var_dump($read_from_file);
$allUser = json_decode($read_from_file,true);
print_r($allUser);

