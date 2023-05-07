<?php

require_once 'autoload.php';

use App\Core\Database;

use App\Core\Session;

use App\Models\User;
use App\Models\News;
use App\Controllers\AuthController;
use App\Controllers\NewsController;
use App\Core\Router;

// Initialize session
$session = new Session();

// Load configuration
$config = require_once 'app/config.php';
$routes = require_once 'app/routes.php';

// Load dependencies
$db = new Database($config['database']);
$pdo = new PDO("mysql:host=localhost;dbname=test", "root", "Helena12!");

// Load models
$user_model = new User($pdo);
$news = new News($pdo);

// Load controllers
$auth_controller = new AuthController($user_model, $session);
$news_controller = new NewsController($pdo, $news);


// Load router
$router = new \App\Core\Router(require 'app/routes.php', $pdo);

// Get current URI
$uri = $_SERVER['REQUEST_URI'];

// Dispatch request to controller
$router->dispatch($uri);
