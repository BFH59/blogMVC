<?php


namespace Core\Database;

use \PDO;

class MysqlDatabase extends Database
{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user='root', $db_pass='root', $db_host = '127.0.0.1:8889')
    {
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_pass = $db_pass;
        $this->db_user = $db_user;
    }

    private function getPDO(){
//verifie si une instance de PDO existe deja sinon on l'a créée
        if($this->pdo === null) {
            $pdo = new PDO('mysql:dbname=blogP5;host=127.0.0.1:8889', 'root', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($statement, $class_name = null, $one = false){
        $req =  $this->getPDO()->query($statement);
        //condition pour vérifier le type de requete
        //Si update, insert ou delete, inutile de faire un fetch et on retourne directement la variable $res
        if(
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ){
            return $req;
        }
        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {

            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one){
            $datas = $req->fetch();
        }else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    public function prepare($statement, $attributes, $class_name = null, $one = false){
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($attributes);
        //condition pour vérifier le type de requete
        //Si update, insert ou delete, inutile de faire un fetch et on retourne directement la variable $res
        if(
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ){
            return $res;
        }
        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {

            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one){
            $datas = $req->fetch();
        }else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    public function lastInsertId(){
        return $this->getPDO()->lastInsertId();
    }
}