<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// echo '<pre>';

$data = [];
$file = fopen('books.csv', 'r');
while(($line = fgetcsv($file)) !=FALSE) {
    $data[] = $line;
}
fclose($file);

$keyArray = $data[0];
$booksArray = [];

$i = 0;

foreach ($data as $key => $element){
    if ($i >0){
        foreach( $element as $index => $item){
            $booksArray[$i][$keyArray[$index]] =$item;
        }
    }
    $i++;
}
?>

<html>
<head>
    <style>
    .wrapper{
        position: relative;       
        width: 80%;
        margin: 0 auto;
        background: #ccc;
        padding: 10px;
        overflow: hidden;
    }
    .box {
        width: 7%;
        height: 400px;
        float: left;
        margin: 30px 2px;
        text-align: center;
        border: 1px solid black;
    }
    .rotate{
        transform: rotate(270deg);
    }
    .year{
        position: absolute;
        color: #ff0000;
        bottom: 50px;
        font-size: 20px;
        margin-left: 10px;
    }
    .width{
        margin-top: 300px;
        width: 300px;
    }
    .name{
        font-size: 20px;
        color: red;
    }
    .box:nth-child(1){
        background-color: yellow;
    }
    .box:nth-child(2){
        background-color: green;
    }
    </style>
</head>
<body>
<div class="wrapper">
        <?php
        foreach ($booksArray as $books): ?>
            <div class="box">
            <div class="background-color: blue">
                <div class="rotate">
                    <div class="width">
                    <?php echo $books['author'] ?>              
                        <div class="name">
                            <?php echo $books['book_name'] ?>
                        </div>
                    </div>
                </div>
                <div class="year">
                    <?php echo $books['years'] ?>
                </div>
            </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>