
<?php
$rates = [
    1 => [
        'code' => 'EUR',
        'value' => '1'
    ],
    2 => [
        'code' => 'USD',
        'value' => '1.15'
    ],
    3 => [
        'code' => 'GBP',
        'value' => '0.905'
    ]
];
if (isset($_POST["convert"])){
    if (isset($_POST["id"])){
        $id = $_GET['id'];

        $convertedValue = $_POST['amount'] * $rates[$id]['rate'];
        echo $convertedValue .$rates[$id]['code'];
    }
}
// print_r($_GET['id']);

?>
<form method="POST" action="">
        <input type="text" name="amount" >Valiuta<br>
    <input type="submit" name="convert" value="Convert">   
</form>