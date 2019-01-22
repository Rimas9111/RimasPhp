<?php
if (isset($_SERVER['PATH_INFO'])){
// path pervesti i mazasias
$path = explode( '/', $_SERVER['PATH_INFO']);
// echo "<pre>";
// print_r($_SERVER);
// die();
$classFile = '';

    //$path[1] - Cpntrolleris
    //$path[2] - metodas
    if (isset($path[1])){ // posts
    $classFile = ucfirst($path[1]).'Controller'; //PostController
    }

    if (file_exists( 'controllers/'.$classFile.'.php')){
        include_once('controllers/'.$classFile.'.php');
        $object = new $classFile;
        if (!empty($path[2])){
            $method = $path[2]; //padaryti i mazasias
        
            if(method_exists($object, $method)){
                if (isset($path[3])){
                    $id = $path[3];
                    $object -> $method($id);
                } else {
                    // $object -> $method();
                    include_once('controllers/ErrorController.php');
                    $errorObject = new ErrorController();
                    $errorObject -> error();
                }         
            } else {
                include_once('controllers/ErrorController.php');
                $errorObject = new ErrorController();
                $errorObject -> error();
            }
        } else {
            $object->index();
        }
    } else {
        include_once('controllers/ErrorController.php');
        $errorObject = new ErrorController();
        $errorObject -> error();
    }
} else {
    echo "indexas";
}
?>

