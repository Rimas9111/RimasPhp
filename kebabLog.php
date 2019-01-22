<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName ="rimas";

$connection = mysqli_connect($serverName, $userName ,$password , $dbName);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} 
// echo "Connected successfully";


if (! empty($_SESSION["id"])){
    $sql = "SELECT * FROM users WHERE id = '" . $_SESSION["id"] . "' LIMIT 1" ;
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
}

$salt = "druska";
$password = md5(md5($_POST['password'] .$salt));

if (! empty($_POST)) {

    $sql = "SELECT * FROM users WHERE email = '" . $_POST['email'] . "' LIMIT 1" ;
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if(! empty($row)) {
        if ($row['password']== $password){
            // settinu sesija
            $_SESSION["id"] = $row["id"];
            $date = date_create();
            $mysql ="UPDATE date SET date = ('" . date_timestamp_get($date) . "')";
            if (mysqli_query($connection, $mysql)){
                echo "Sveikas";
            } else {
                echo "Klaida " .$mysql . mysqli_error($connection);
            }
        } else {
            echo "Blogai ivestas slaptazodis";
        }
    
    } else {
        echo 'Tokio vartotojo nera';
    }
}
?>