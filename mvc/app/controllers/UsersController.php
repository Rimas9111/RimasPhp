<?php
namespace App\Controllers;

use App\Libs\Controller;

use App\Models\Users;

use App\Helpers\FormHelper;

use App\Helpers\PasswordHelper;

use App\Helpers\Helper;

// include_once '/wamp64/www/RimasPhp/mvc/libs/Controller.php';
// include_once '/wamp64/www/RimasPhp/mvc/models/Users.php';
// include_once '/wamp64/www/RimasPhp/mvc/helpers/FormHelper.php';
// include_once '/wamp64/www/RimasPhp/mvc/helpers/PasswordHelper.php';
// include_once '/wamp64/www/RimasPhp/mvc/helpers/Helper.php';

class UsersController extends Controller
{
    // public function index(){
    //     echo 'useriai veikia';
    // }

    public function index(){
        $form = new FormHelper('POST','http://localhost/rimasphp/mvc/index.php/users/store/');

        $form->input([
            'name' => "email",
            'type' => "email",
            'placeholder' => "example@gmail.com"         

        ])->input([
            'name' => "name",
            'type' => "text",
            'placeholder' => "John"
        
        ])->input([
            'name' => "password",
            'type' => "password",
            'placeholder' => "psw"
        ]);
        $form->input([
            'name' => "register",
            'type' => "submit",
            'value' => "Register"
        ]);

        echo $form->get();
    }

    public function store(){
        $user = new Users();
        if(isset($_POST['register'])){
            $email = $_POST['email'];
            $name = $_POST['name'];
            $password = PasswordHelper::password($_POST['password']);
            $active = '1';
            $role = '1';
            $user->insertUser($email, $name, $password, $active, $role);
        }
    }
    public function log($id){
        $form = new FormHelper('POST','http://localhost/rimasphp/mvc/index.php/users/logUser/');
        $user = new Users();

        $form->input([
            'name' => "email",
            'type' => "email",
            'placeholder' => "example@gmail.com"                
        ])->input([
            'name' => "password",
            'type' => "password",
            'placeholder' => "psw"
        ]);
        $form->input([
            'name' => "log",
            'type' => "submit",
            'value' => "Log"
        ]);

        echo $form->get();
    }
    public function logUser($id){
        $user = new Users;
        if(isset($_POST['log'])){
            $email = $_POST['email'];
            $password = PasswordHelper::password($_POST['password']);
            $x = $user->logUser($email, $password);
            print_r($x->fetch_assoc());
            // echo '<br>' .$info['name'];

            echo '<br>' ."setint sesija autoriaus name";
        }
    }
}
?>