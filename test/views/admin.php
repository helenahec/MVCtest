<!DOCTYPE html>

<html>

    <head>

        <title>Admin</title>

        <link rel="stylesheet" href="/public/css/style.css">

    </head>

    <body>

        <div class="container">

            <img src="/public/img/logo.svg" alt="Logo" id="logo">

            <?php  if (!empty($success_message)): ?>

                <div class="success-message">
                    
                    <?= $success_message; ?>
                
                </div>
                
            <?php endif; ?>


            <?php if (count($articles) > 0): ?>
        
                <h3>All News</h3>

            <?php endif; ?>


            <?php foreach ($articles as $article) : ?>
                
                <div class="article">
            
                    <div class="article-text">

                    <span class="text" data-id="id" style="display: none;" ><?= $article['id'] ?></span>
            
                        <span class="text" data-id="title"><?= $article['title'] ?></span>
            
                        <span data-id="description"><?= $article['description'] ?></span>
            
                    </div>
            
                    <div class="article-icons">

                        <form method="POST" action="admin/delete">

                            <input type="hidden" name="id" value="<?php echo $article['id']; ?>">

                                <button id="edit-icon" style="border: none; background-color: transparent;">

                                    <img src="/public/img/pencil.svg" alt="Edit" class="icon" >

                                </button>

                            <input type="hidden" name="id" value="<?= $article['id'] ?>">

                                <button name="Delete" style="border: none; background-color: transparent;">

                                    <img src="/public/img/close.svg" alt="Delete" class="icon">

                                </button>

                        </form>

                    </div>

                </div>

                <?php endforeach; 

                require_once __DIR__ . '/news/create.php'; 

                require_once __DIR__ . '/news/edit.php'; 
                
                ?>


        </div>

        <script src="/public/js/editNews.js"></script>

    </body>

</html>