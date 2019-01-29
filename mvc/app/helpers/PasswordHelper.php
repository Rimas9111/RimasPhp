<?php
namespace App\Helpers;
class PasswordHelper
{
    public static function password($password){
        $salt = "druska";
        $password = md5(md5($password .$salt));
        return $password;
    }
}
?>