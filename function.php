<?php 


function dd($VALUE){
    echo "<pre>";
    var_dump($VALUE);
    echo "<pre>";
    // die();
}

function abort($code = 404){
    http_response_code($code);
    require "controllers/{$code}.php";
    die();
}

function routeToController($uri ,$routs){
    if(array_key_exists($uri ,$routs )){
        require ($routs[$uri]);
    }else{
        abort();
    }
}


function authorization($condition , $status = Response::FORBIDDEN){
    if(!$condition){
        abort($status);
    }
}