<?php
namespace App\Controllers;

use App\Libs\Controller;

// include_once '/wamp64/www/RimasPhp/mvc/libs/Controller.php';
class ErrorController extends Controller
{
    public function error(){
        $this->view->error = '404 page not found';
        $this->view->render('error');
    }
}

?>