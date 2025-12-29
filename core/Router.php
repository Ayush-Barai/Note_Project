<?php 
// require 'function.php';
namespace Core ;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    // Similarly for delete, patch, put...
    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

     public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    protected function add($method, $uri, $controller)
    {
        $this->routes[] = compact('method', 'uri', 'controller');

        return $this;
    }

    public function only($key){
        $this->routes[array_key_last($this->routes)]['middleware'] = $key; 

        return $this ;
    }

    public function route($uri, $requestMethod)
{
        $requestMethod = strtoupper($requestMethod);

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && strtoupper($route['method']) === $requestMethod) {
                //apply middleware here 
                if($route['middleware'])
                {
                    Middleware::resolve($route['middleware']);
                }

                return require base_path("Http/controllers/" . $route['controller']);
            }
        }

        abort(404);
    }

}


