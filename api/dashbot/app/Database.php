<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Database extends Model
{
    var $name;

    public function __construct($name = null)
    {
        $this->name = $name;
    }

    public function sendQuery(){
        //TODO : Implements database query process
        return true;
    }

}
