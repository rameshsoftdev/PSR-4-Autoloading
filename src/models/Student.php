<?php

namespace App\models;

class Student{
    function __construct(public $name,public $age)
    {
        
    }
    public function getStudentInfo(){
      return <<<TEXT
      $this->name is $this->age
      TEXT;
    }
}