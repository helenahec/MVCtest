<?php

namespace App\Controllers;

use App\Models\News;

use PDO;

interface NewsControllerInterface

{
    public function index();
    public function create();
    public function edit();
    public function delete();
}

class NewsController implements NewsControllerInterface

{
    private $pdo;
    private $news;
    private $success_message;

    public function __construct(PDO $pdo, News $news)

    {
        $this->pdo = $pdo;
        $this->news = $news;
    }


    public function index()

    {
        $articles = $this->news->getAll();
        $success_message = $_SESSION['success_message'] ?? '';
        unset($_SESSION['success_message']);

        require __DIR__ . '/../../views/admin.php';

    }

    public function create()

    { 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        
        {

            if (isset($_POST['Create'])) 

                {
                    
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $this->news->create($title, $description);
                    $_SESSION['success_message'] = 'News was successfully created!';

                    header('Location: /admin');

                    exit;
                }

            elseif (isset($_POST['Logout'])) 
            
            {
              
                    $this->session->delete('loggedin');
        
                    $this->session->delete('username');
        
                    require __DIR__ . '/../../login.php';
                    
                    exit;
            }

        }
    
        return require_once __DIR__ . '/../../views/admin.php';

    }

    public function edit()

    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        
        {
            $id = $_POST['id'];

            $title = $_POST['title'];

            $description = $_POST['description'];

            $this->news->update($id, $title, $description);

            $_SESSION['success_message'] = 'News was successfully changed!';


            header('Location: /admin');

            exit;

        }

        $id = $_GET['id'];

        $newsItem = $this->news->getById($id);


        return require_once __DIR__ . '/../views/news/edit.php';

    }

    public function delete()

    {

        $id = $_POST['id'];
        $this->news->delete($id);
        $_SESSION['success_message'] = 'News was successfully deleted!';


        header('Location: /admin');

        exit;

    }
    
}
