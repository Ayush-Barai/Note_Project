<?php 

use core\App;
use core\Database;
use core\Validator;


$db = App::resolve(Database::class);

$email = $_POST["email"];
$password = $_POST["password"]; 

$errors = [];

if(! Validator::email($email)){
    $errors['email'] = 'Please Provide a valid email address. ';
}

if(! Validator::string($password  , 7 , 255 )){
    $errors['password'] = 'Please Provide a valid password at least 7 characters. ';
}

if(! empty($errors)){
    return view('registration/create.view.php',[
        'errors'=> $errors
    ]);
}


$user = $db->query('SELECT * from users where email = :email' , [
    'email'=> $email
])->find();


if($user)
{
    //User exist in database redirect to home page
    
    header('location: /');

    exit();

}
else 
{
    // if user not exist in database 
    $db->query('INSERT INTO users(email , password) VALUES (:email , :password)', [
        'email'=> $email,
        'password'=> password_hash($password , PASSWORD_BCRYPT)
    ]);


    $user = $_POST;

    login($user);
    
    header('location: /');

    exit();

}