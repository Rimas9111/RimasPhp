<?php
namespace App\Controllers;

use App\Libs\Controller;

// include_once '/wamp64/www/RimasPhp/mvc/libs/Controller.php';
class FooterController extends Controller
{
    public function footer(){
        $this->view->footer = 'footeris';
        $this->view->render('footer');
    }
}

?>