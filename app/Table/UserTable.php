<?php

namespace App\Table;

use \Core\Table\Table;

class UserTable extends Table
{

    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function login($username, $password){
        $user = $this->query('SELECT * FROM users WHERE username = ?',[$username],  true);
        if($user){
            if($user->password === sha1($password)){
                $_SESSION['auth'] = $user->id;
                $_SESSION['usertype'] = $user->usertype;
                return true;
            }
        }
        return false;

    }

    /**
     * @param $username
     * @param $email
     * @return bool
     */
    public function userExists($username, $email){
        $userExists = $this->query('SELECT * FROM users WHERE username = ? OR email = ?',[$username, $email],  true);
        if($userExists){
                return true;
            }
        return false;

    }
}