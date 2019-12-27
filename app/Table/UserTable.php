<?php

namespace App\Table;

use \Core\Table\Table;

class UserTable extends Table
{
    public function userExists($username, $email){
        $userExists = $this->db->prepare('SELECT * FROM users WHERE username = ? OR email = ?',[$username, $email], null, true);
        if($userExists){
                return true;
            }
        return false;

    }
}