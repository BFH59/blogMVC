<?php


namespace App\Table;

use App\app;

class Categorie extends Table
{

    protected static $table = "categories";



    public function getUrl(){
        return 'index.php?p=category&id='.$this->id;
    }
}