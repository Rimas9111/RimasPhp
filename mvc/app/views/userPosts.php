<?php 
    if(isset($_SESSION['id'])){
        echo $this->form;
    } else {
        echo 'Login to add new post';
    }		
?>