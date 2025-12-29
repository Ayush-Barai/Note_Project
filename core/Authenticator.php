<?php

namespace Core;
use core\App;
use core\Database;
class Authenticator{

    public function attempt($email ,$password){
        //match the credentials 
        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        // if the user not exist in database 
        if ($user) {

            // verify password for the user 

            if (password_verify($password, $user['password'])) {

                // Log in the user if credentials are matched
                $this->login(
                    [
                        'email' => $email
                    ]
                );

                return true;    
            }
        }

        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];
        session_regenerate_id(true);
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain']);
    }
}