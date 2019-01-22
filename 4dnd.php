<form method="POST" action="">
    <input type="text" name="name" placeholder="John" require>Name<br>
    <input type="email" name="email" placeholder="john@gmail.com" require>Email<br>
    <input type="number" name="phone" placeholder="86*******" require>Phone<br>
    <input type="submit" name="subscribe" value="Subscribe">   
</form>

<?php

// $contacts = [
//         'name' => $_POST['name'],
//         'email' => $_POST['email'],
//         'phone' => $_POST['phone']
// ];

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
// $contacts = ($_POST['name'] . $_POST['email'] . $_POST['phone']);

$file = fopen("contacts.csv","a");

if (isset($_POST['subscribe'])){
    if (!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['phone'])){
        // foreach ($contacts as $line) {
            $input = explode(',',$name.',' .$email .',' .$phone);
            fputcsv($file,$input);
            echo "name: " .$name ."<br>" ."email: " .$email ."<br>" ."phone: " .$phone ."<br>";
        }
    // }

    // fputcsv($file,explode(',',$_POST['name'].','.$_POST['email'].','.$_POST['phone']));
    
}

fclose($file);
?>