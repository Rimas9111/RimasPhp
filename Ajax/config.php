<?php
$user = 'root';
$pass = '';
$db = 'rimasphp';
$conn = mysqli_connect('localhost', $user, $pass, $db);
if (!$conn){
    echo 'error connecting to database!' . mysqli_connect_error();
}
?>