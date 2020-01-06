<?php

namespace Core\Auth;

use Core\Database\Database;

class DBAuth {

    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getUserId(){
        if($this->logged()){
            return $_SESSION['auth'];
        }
        return false;
    }

    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    /**
    public function login($username, $password){
        $user = $this->db->prepare('SELECT * FROM users WHERE username = ?',[$username], null, true);
        if($user){
           if($user->password === sha1($password)){
               $_SESSION['auth'] = $user->id;
               $_SESSION['usertype'] = $user->usertype;
               return true;
           }
        }
        return false;

    }
*/
    public function logged(){
        return isset($_SESSION['auth']);
    }
// verifie si l'utilisateur est admin (usertype = 2) pour accès au dashboard
    public function isAdmin(){
        if(isset($_SESSION['usertype']) && $_SESSION['usertype'] === '2'){
            return true;
        }
        return false;
    }
}