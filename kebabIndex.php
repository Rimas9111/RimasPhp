<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kebabas</title>
</head>
<body>
<form method="POST" action="kebab.php">
    <div class="input-group">
        <label for="email"><b>EMAIL</b></label><br>
        <input type="email" placeholder="example@email.com" name="email" required><br>    
    </div>
    <div class="input-group">
        <label for="password"><b>PASSWORD</b></label><br>
        <input type="password" placeholder="**********" name="password" required>                    
    </div>
    <div class="input-group">
        <label for="passwordConfig"><b>REPEAT PASSWORD</b></label><br>
        <input type="password" placeholder="**********" name="passwordConfig" required>                    
    </div>
    <div class="input-group">
        <label for="first_name"><b>Vardas</b></label><br>
        <input type="text" placeholder="Vardenis" name="first_name" required>                    
    </div>
    <div class="select-group">
        <label for="kebab"><b>Kebabinės</b></label><br>
        <select name="kebab">
            <?php
            $kebab = [
            "1"=>"Jammi",
            "2"=>"Wraperia",
            "3"=>"Sinano Kebabai",
            "4"=>"Kebab inn"
            ];
            foreach($kebab as $key=>$value){
            ?>
        <option value=<?php echo "$kebab[$key]"?>><?php echo "$value"?></option>
            <?php }
            ?>  
        </select><br>              
    </div>
    <input type="submit" name="submit" value="Register"><br><br>
    <button type="button" onclick="location.href = 'kebabLog.html';">Sign in</button>
</form>
</body>
</html>