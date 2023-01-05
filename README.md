# PSR-4 Autoloading With Composer

When you build PHP applications, you may need to use third-party libraries. And as you know, if you want to use these libraries in your application, you need to include them in your source files by using require or include statements.

Specifically, Composer provides four different methods for autoloading files:
 - file autoloading
 - classmap autoloading
 - PSR-0 autoloading
 - PSR-4 autoloading

As per the official Composer documentation, PSR-4 is the recommended way of autoloading, and we’ll go with PSR-4

Before we go ahead, let’s quickly go through the steps that you need to perform when you want to use Composer autoloading.
 - Define the *composer.json* file in the root of your project or library. It should contain  directives based on the type of autoloading.
 - Run the ```composer dump-autoload``` command to generate the necessary files that Composer will use for autoloading.
 - Include the `` `require 'vendor/autoload.php' `` statement at the top of the file where you want to use autoloading.

## Autoloading: The files Directive

All the source files that are referenced with the files directive will be loaded every time your application runs. This is useful for loading source files that do not use classes.

To use file autoloading, provide a list of files in the files directive of the ```composer.json``` file, as shown in the following.
```
{
    "autoload": {
        "files": ["libraries/common.php", "libraries/functions.php"]
    }
}
```
After you create the composer.json file in your project root with the above contents, you just need to run the composer dump-autoload command to create the necessary autoloader files.

These will be created under the vendor directory. Finally, you need to include the require 'vendor/autoload.php' statement at the top of the file where you want to autoload files with Composer, as shown in the following
```
<?php
require 'vendor/autoload.php';
?>
```

For example, if the function ```getCurrentDate()``` defined in ```libraries/functions.php```, we can use this function in our ```index.php``` file like shown below
```
<?php
require 'vendor/autoload.php';
echo getCurrentDate();
?>
```

In PSR-4 autoloading, you can shorten the directory structure, which results in a much simpler directory structure compared to PSR-0 autoloading.
composer.json file looks with PSR-4 autoloading. In ```composer.json```, we need to add section ```psr-04``` under ```autoload``` as shown below
```
 "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    }
```
Here ``` "App\\": "src/" ``` means, take the path from src where namespace start with ```App\```

For example, I have created a model file ```src\models\Student.php``` with the ```namespace App\models;```. When we want to access the method from this model file, we just need to use following lines of code. To illustrate this, I have included the code in index.php
```
require __DIR__.'/../vendor/autoload.php';
use App\models\Student;

$student = new Student('Ramesh',34);
echo $student->getStudentInfo();
```

###Enjoy Coding :) 




