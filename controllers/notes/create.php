<?php
require 'Validator.php';
$heading = "Create note";
$config = require('config.php');


$db = new Database($config['databases']);



if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $errors = [];

    $validator = new Validator();

    if(! Validator::string($_POST['body'],1,100000)){
        $errors['body'] = 'A body is required !!';
    }
    // if(strlen($_POST['body']) > 10000){
    //     $errors['body'] = 'A body can not be more than 10000 characters !!';
    // }


    if(empty($errors)){
         $db->query("INSERT INTO `notes` (`body`, `user_id`) VALUES(:body, :user_id)" , [
            'body'=>$_POST['body'],
            'user_id'=> 1
        ]);
    }

}

require 'views/notes/create.view.php' ;