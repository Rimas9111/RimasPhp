<?php

class View
{
    private $viewCatalogPath = '/wamp64/www/RimasPhp/mvc/views/';

    public function render($templatePath){
        require ($this->viewCatalogPath . 'header.php');
        require ($this->viewCatalogPath  .$templatePath .'.php');
        require ($this->viewCatalogPath . 'footer.php');
    }
}

?>