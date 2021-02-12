<link href="CSS/istyle.css" rel="stylesheet" media="all">

<?php

$type = $_POST['type'];
$id = $_POST['id'];
$title = $_POST['title'];
$url = $_POST['url'];
$content = $_POST['content'];
$image = $_POST['image'];

$category = $_POST['category'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Update blog</title>
    <link href="CSS/style.css" rel="stylesheet" media="all">
</head>

<body>

    <!-- HEADER INCLUDE -->
    <?php include('./Templates/header.php'); ?>

    <!--MAIN CONTENT -->
    <form action="insert_update_blog.php" id="form" method="POST">
        <div class="main-content">
            <h1>Update Blog<?php echo $id ?></h1>
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
                    <th>Published At</th>
                    <th>Category</th>
                </thead>
                <tbody>
                    <td>
                        <input type="datetime-local" name="created">
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
            <input type="text" style="display:none;" name="type" value="contact_update">
            <input type="text" style="display:none;" name="id" value="<?php echo $id ?>">
            <input type="submit" name="updateContact" value="Update">
    </form>

    </div>
</body>
<!-- FOOTER INCLUDE -->
<?php include('./Templates/footer.php'); ?>
</html>