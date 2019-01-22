<form method="POST" action="">
    <input type="text" name="text">text<br>
    <input type="submit" name="submit">   
</form>

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


// to db
// $mysql ="INSERT INTO db (text) VALUES ('" . $_POST['text'] . "')";
// if (mysqli_query($connection, $mysql)){
//     echo "Pavyko";
// } else {
//     echo "Klaida " .$mysql . mysqli_error($connection);
// }

// mysqli_close($connection);

//from db
// $sql = "SELECT * FROM db";
// $result = mysqli_query($connection, $sql);
// if (mysqli_num_rows($result) > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo $row['text'];
//     }
// }

?>