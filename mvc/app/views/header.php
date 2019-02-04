<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/rimasphp/mvc/css/style.css">
    <title><?php echo $this->title; ?></title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="http://localhost/rimasphp/mvc/js/function.js"></script>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/rimasphp/mvc/index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/rimasphp/mvc/index.php/posts/add">add</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/rimasphp/mvc/index.php/users/add">regist</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/rimasphp/mvc/index.php/posts">postai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/rimasphp/mvc/index.php/users/log">loginas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/rimasphp/mvc/index.php/users">users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/rimasphp/mvc/index.php/users/logOut">logout</a>
                </li>
            </ul>
        </div>
        <div>
            <?php 
            if(isset($_SESSION["id"])){
                    echo "<br>" . "Sveiki " . $_SESSION["name"];
            }
            ?>
        </div>
    </nav>
