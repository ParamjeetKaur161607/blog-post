<?php

class Router{

    public static function load($file){
        $router= new Router;

        require $file;

        return $router;
    }

    public $routes=[
        'GET'=>[],
        'POST'=>[]
    ];

    public function get($uri,$controller){
        return $this->routes['GET'][$uri]=$controller;
    }

    public function post($uri,$controller){
        return $this->routes['POST'][$uri]=$controller;
    }
    
    // public function define($routes){
    //     $this->routes=$routes;
    // }

    public function direct($uri,$request){
        if(array_key_exists($uri,$this->routes[$request])){           
            return $this->routes[$request][$uri];

        } else {
            throw new Exception('no route defined');
        }

        // 
    }

}