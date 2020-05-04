<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    var $id;

    public function __construct($id = null)
    {
        $this->id = $id;
    }

    public function show(){
        $arr = array(
            "0" => array(
                "name" => "Thibault",
                "lastname" => "Linossier"
            ),
            "1" => array(
                "name" => "Valentin",
                "lastname" => "Ernouf"
            ),
            "2" => array(
                "name" => "Romain",
                "lastname" => "Bouiller"
            ),
        );

        /*$database = new Database();

        /*req = "SELECT * FROM users WHERE id = ".$this->id.";";
        $res = $database->sendQuery($req);
        return json_encode($res);*//*

        $db = $database->sendQuery();*/

        $res = $arr[$this->id];
        $res["db_ok"] = $db;

        return $res;
    }
}
