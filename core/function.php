<?php 

use core\Response;


function base_path ($path){

    return BASE_PATH . $path;

}
function dd($VALUE){
    echo "<pre>";
    var_dump($VALUE);
    echo "<pre>";
    die();
}

function abort($code = 404){
    http_response_code($code);
    require base_path("controllers/{$code}.php");
    // die();
}

function routeToController($uri ,$routs){
    if(array_key_exists($uri ,$routs )){
        require base_path($routs[$uri]);
    }else{
        abort();
    }
}


function authorization($condition , $status = Response::FORBIDDEN){
    if(!$condition){
        abort($status);
    }
}



function view($path , $attributes = [] ){
    extract($attributes);
    require base_path('views/' . $path); // (/../views/index.view.php ) 
}