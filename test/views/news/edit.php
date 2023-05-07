<div id="edit-form-container">

    <div id="edit-header">

        <h3 id="edit-heading">Edit News</h3>

            <form method="POST" action="/admin/edit" id="edit-form">
                    
                <input type="hidden" name="id" value="<?php echo $article['id']; ?>">

                    <button id="cancel-edit">

                        <img src="/public/img/close.svg" alt="Cancel" class="icon">

                    </button>

    </div>

    <div>

        <input type="hidden" id="edit-id-input" name="id"  value="<?= $article['id'] ?>">

        <input type="text" id="edit-title-input" name="title" placeholder="Title" value="<?= $article['title'] ?>">

        <textarea id="edit-description-input" class="description" name="description" placeholder="Description"><?= $article['description'] ?></textarea>


    </div>

    <div>

        <button type="submit" name="Save" id="save">Save</button>
        
            </form>

        <form method="POST" action="/logout">

        <input type="hidden" name="action" value="logout">

        <button type="submit">Logout</button>

    </div>

    
</div>