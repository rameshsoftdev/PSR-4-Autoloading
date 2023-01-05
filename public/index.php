<?php
require __DIR__.'/../vendor/autoload.php';

spl_autoload_register(function($classname){
 // echo $classname;exit;
});
use App\models\Student;



$student = new Student('Ramesh',34);
echo $student->getStudentInfo();

echo getCurrentDate();
