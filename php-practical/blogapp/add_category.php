<!DOCTYPE html>
<html>

<head>
    <title>Add Contacts</title>
    <link href="CSS/istyle.css" rel="stylesheet" media="all">


</head>

<body>

    
    <form action="insert_update_blog.php" method="POST" id="form" name="insertForm">
        <div class="main-content">
            <h1>Add New Category</h1>
            <hr>

            <table class="table-1">

                <thead class="thead-1">
                    <th>ID</th>
                    <th>Title</th>
                </thead>

                <tbody>
                    <td>
                        <input type="text" name="id" value="auto" disabled="disabled">
                    </td>
                    <td>
                        <input type="text" name="title">
                    </td>
                </tbody>
                <thead class="thead-1">
                    <th>Content</th>
                    <th>URL</th>
                </thead>
                <tbody>
                    <td>
                        <textarea  name="content" rows="5" cols="30" ></textarea>
                    </td>
                    <td>
                        <input type="text"  name="URL">
                    </td>
                </tbody>
                <thead class="thead-1">
                    <th>Meta title</th>
                    <th>Parent Category</th>
                </thead>
                <tbody>
                    <td>
                        <input type="text" name="created">
                    </td>
                    <td>
                        <select name="category">
                        <option value="LIfestyle">Lifestyle</option>
                        <option value="Health">Health</option>
                        <option value="Education">Education</option>
                        <option value="Music">Music</option>
                        </select>
                    </td>
                    
                </tbody>
                <thead class="thead-1">
                    <th>Image</th>
                </thead>
                <tbody>
                    <td>
                        <input type="file" name="image">
                    </td>
                    
                </tbody>
            </table>


            <input type="text" style="display:none;" name="type" value="contact_insert">
            <input type="submit" name="addContact" value="Add">
    </form>
    </div>
    
</body>
</html>


