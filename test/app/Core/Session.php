<?php

namespace App\Core;

interface SessionInterface

{
    public function set(string $key, $value);
    
    public function get(string $key);
    
    public function delete(string $key);
}

class Session implements SessionInterface

{
    public function __construct()

    {
        if (!isset($_SESSION)) 
        
        {
            session_start();
        }

    }
    


    public function set($key, $value)

    {
        $_SESSION[$key] = $value;
    }

    public function get($key)

    {
        return $_SESSION[$key] ?? null;
    }

    public function delete($key)
    
    {
        unset($_SESSION[$key]);
    }
    
}

