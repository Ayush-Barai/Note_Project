<?php 

namespace Http\Forms;
use Core\Validator;

class LoginForm{

    protected $errors = [];
    public function validate($email , $password){

        if(! Validator::email($email)){
            $this->errors['email'] = 'Please Provide a valid email address. ';
        }

        if(! Validator::string($password  )){
            $this->errors['password'] = 'Please Provide a valid password. ';
        }

        return  empty($errors);
    }
    public function errors(){
        return $this->errors;
    }
}