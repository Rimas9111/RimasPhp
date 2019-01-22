<?php
include_once 'View.php';
class Controller
{
    // protected $viewCatalogPath = '/wamp64/www/RimasPhp/mvc/libs/Controller.php';
    protected $view;
    public function __construct()
    {
        $this->view = new View;
    }
}

?>