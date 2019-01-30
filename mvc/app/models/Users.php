<?php 
namespace App\Models;

use App\Libs\Database;

// include_once 'libs/Database.php';
class Users
{
    public function insertUser($email, $name, $password, $active, $role){
        $db = new Database();
        $db->insert()
        ->into('`users`')
        ->row(['`email`','`name`','`password`','`active`','`role`'])
        ->value("'$email', '$name', '$password', '$active', '$role'");
        return $db->get();
    }

    public function logUser($email){
        $db = new Database();
        $db->select()->from('users')->where('email',$email);
        return $db->get();
    }

    // public function logUser($email, $password){
    //     $db = new Database();
    //     $db->select()->from('users')->where('email',$email)->whereAnd('password',$password)->whereAnd('active',1);
    //     return $db->get();
    // }
}