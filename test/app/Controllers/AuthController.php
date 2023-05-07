<?php

namespace App\Controllers;

use App\Models\User;
use App\Core\Session;

interface AuthControllerInterface

{
    public function login();
    public function logout();
}

class AuthController implements AuthControllerInterface

{

    private $user;
    private $session;

    public function __construct(User $user, Session $session)

    {
        $this->user = $user;
        $this->session = $session;

    }

    public function login()

    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) 
        
        {
            // Verify user's credentials
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->user->findByUsername($username);


            if ($user && $this->user->verifyPassword($password, $user['password'])) 
            
            {
                // Set session variables and redirect to the admin page
                $this->session->set('loggedin', true);
                $this->session->set('username', $user['username']);

                header('Location: /admin');

                exit;

            } 
            
            else 
            
            {
                // Set error message and redirect back to login page
                $this->session->set('error', 'Wrong Login Data!');

                header('Location: /login');

                exit;

            }

        }

        require __DIR__ . '/../../views/login.php';

    }

    public function logout()

    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) 
        
        {
            $this->session->delete('loggedin');
            $this->session->delete('username');

            header('Location: /login');

            exit;
        }

    }
    
}
