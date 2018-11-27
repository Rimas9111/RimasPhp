<?php
include 'config.php';
$name    = $_POST['name'];
$surname = $_POST['surname'];
$email   = $_POST['email'];
if(!empty($_POST['name'] && $_POST['surname'] && $_POST['email'])){
    $sql = "insert into usersajax (name, surname, email)
    values ('$name', '$surname', '$email' )";
    mysqli_query($conn, $sql);    
} else {
    echo "Pildyk viską";
}
?>