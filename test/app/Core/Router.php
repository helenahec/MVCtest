<?php

namespace App\Core;

use App\Models\User;
use App\Models\News;


use PDO;

interface RouterInterface

{
    public function __construct(array $routes, PDO $pdo);
    public function dispatch($uri);

}

class Router implements RouterInterface

{
    private $routes = [];
    private $pdo;

    public function __construct(array $routes, PDO $pdo)

    {
        $this->routes = $routes;
        $this->pdo = $pdo;

    }

    public function dispatch($uri)

    {
        $uri = parse_url($uri, PHP_URL_PATH);


        foreach ($this->routes as $route => $params) 
        
        {

            if ($uri === $route) 
            
            {
                $controller_name = 'App\\Controllers\\' . $params['controller'];
                $action_name = $params['action'];
    
                // Add the dependencies here
                $user = new User($this->pdo);
                $session = new \App\Core\Session();
                $controller = null;
                $news = null;


                if ($controller_name === 'App\\Controllers\\NewsController') 
                
                {
                    $news = new News($this->pdo);
                    $controller = new $controller_name($this->pdo, $news, $session);
                } 
                
                else 
                
                {
                    $controller = new $controller_name($user, $session);
                }

    
                if (method_exists($controller, $action_name)) 
                
                {
                    $controller->$action_name();

                    return true;
                }
                
            }
        }
    
        return false;
    }
}
