<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="script.js" async></script>
</head>
<body>
    
    <div class="form">
        <form action="" method="POST" class="ajax">                
            <label for="name"> Vardas: </label>
            <input class="field" type="text" id="name" name="name"><br>
            
            <label for="surname"> Pavardė: </label>
            <input class="field" type="text" id="surname" name="surname"><br>

            <label for="email"> Email: </label>
            <input class="field" type="email" name="email"><br>

            <button type="submit" class="Submit" name="submit">Pateikti</button>
        </form>
    </div>

</body>
</html>

