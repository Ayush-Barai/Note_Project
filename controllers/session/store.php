<?php 

use core\App;
use core\Database;
use core\Validator;


$db = App::resolve(Database::class);

$email = $_POST["email"];
$password = $_POST["password"]; 

//validation for user 

$errors = [];

if(! Validator::email($email)){
    $errors['email'] = 'Please Provide a valid email address. ';
}

if(! Validator::string($password  )){
    $errors['password'] = 'Please Provide a valid password. ';
}

if(! empty($errors)){
    return view('session/create.view.php',[
        'errors'=> $errors
    ]);
}

//match the credentials 

$user = $db->query('SELECT * FROM users WHERE email = :email' ,[
    'email'=> $email
])->find();

// if the user not exist in database 
if($user){
    
    // verify password for the user 

    if(password_verify($password , $user['password'])){
        
        // Log in the user if credentials are matched
        login(
            [
                'email'=>$email
            ]
        );

        header('location: /');

        exit();
    }

}


// if the password validation fails then  
return view('session/create.view.php',[
        'errors'=> [
            'password'=> 'No user with this email and password !!'
        ]
    ]);
