<?php

/***
 * 
 * singleton 
 * private construct but we can access
 * if you wanna to make many objects ,but all refer to the same
 * mean that all objects is the refrence for only one
 * this will help you
 * we can use with database connection
 * 
 */

//design pattern
class Database{

    public static $instance;
    public static function getInstance(){
        Database::$instance = new Database();
        return Database::$instance;
    }

    public function showInstance(){
        echo 'SingleTon Design Pattern ,Accessed From Class';
    }

    private function __construct(){
        return 'private';
    }

}

$db = Database::getInstance();

echo $db->showInstance();
// print_r($db);


 ?>