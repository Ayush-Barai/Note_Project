<?php

use Core\Authenticator;
use Http\Forms\LoginForm;



$form = LoginForm::validate($attributes = [
    "email" => $_POST["email"],
    "password" => $_POST["password"]
]);

$auth = new Authenticator();
$signedIn = $auth->attempt($attributes['email'], $attributes['password']);
// dd($signedIn);

if (!$signedIn) {
    $form->error('password', 'Email or Password is wrong !!')->throw();
}

redirect('/');
