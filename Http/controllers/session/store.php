<?php

use Core\Authenticator;
use Http\Forms\LoginForm;
use Core\Session;


$email = $_POST["email"];
$password = $_POST["password"];

//validation for user 

$form = new LoginForm();

if ($form->validate($email, $password)) {

    $auth = new Authenticator();

    if($auth->attempt($email, $password)){
        redirect('/');
    }

    $form->error('password' , 'Email or Password is wrong !!' );
}


Session::flash('errors', $form->errors());

Session::flash('old',[
    'email'=> $_POST['email'],
]);

return redirect('/login');


 