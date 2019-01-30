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
    public function log(){
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
            $userInfo = $user->logUser($email);
            $info = $userInfo->fetch_assoc();
            if ($email == $info['email']){
                if ($info['active'] == "0"){
                    if ($password != $info['password']){
                        echo "Password do not match";
                    } else {
                        $_SESSION['id'] = $info['id'];
                        $_SESSION['name'] = $info['name'];
                        echo "Labas " .$_SESSION['name'];
                        $_SESSION['login'] = TRUE;
                        // header('Location: http://localhost/rimasphp/mvc/index.php/posts');
                    }
                } else {
                    echo 'This user is not active';
                }
            } else {
                echo 'User do not exist';
            }
                // print_r($userInfo->fetch_assoc());          
                // echo '<br>' ."setint sesija autoriaus name";
        }
    }
}
?>