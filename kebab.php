<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName ="phpdb";

$connection = mysqli_connect($serverName, $userName ,$password , $dbName);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} 
// echo "Connected successfully";

$sql = "SELECT email FROM users WHERE email = '" . $_POST['email'] . "'" ;
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
//          if email exist
if (! empty($row)) {
    echo "Toks email jau egzistuoja";
} else {
    $mysql ="INSERT INTO kebab (kebab) VALUES ('" . $_POST['kebab'] . "')";
    if (mysqli_query($connection, $mysql)){
        echo "Pavyko";
    } else {
        echo "Klaida " .$mysql . mysqli_error($connection);
    }
    $salt = "druska";
    $password = md5(md5($_POST['password'] .$salt));

    $mysql ="INSERT INTO users (email, password, first_name) VALUES ('" . $_POST['email'] . "', '" . $password . "', '" . $_POST['first_name'] . "')";
    if (mysqli_query($connection, $mysql)){
        echo "Pavyko";
    } else {
        echo "Klaida " .$mysql . mysqli_error($connection);
    }
    $date = date_create();
    $mysql ="INSERT INTO date (date) VALUES ('" . date_timestamp_get($date) . "')";
    if (mysqli_query($connection, $mysql)){
        echo "Pavyko";
    } else {
        echo "Klaida " .$mysql . mysqli_error($connection);
    }
    mysqli_close($connection);
    header('Location: kebabLog.html');
    exit;
}
?>