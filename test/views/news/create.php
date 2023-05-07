<div id="create-form-container">

    <h3>Create News</h3>

        <form method="POST" action="/admin/create">

            <div>

                <input type="text" id="title" name="title" placeholder="Title">

                <textarea id="description" class="description" name="description" placeholder="Description"></textarea>

            </div>

            <div>

                <button type="submit" name="Create">Create</button>

        </form>

                <form method="POST" action="/logout">

                    <input type="hidden" name="action" value="logout">

                    <button type="submit">Logout</button>
                    
                </form>

            </div>

</div>