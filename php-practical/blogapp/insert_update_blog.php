<html>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>   
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    </head>
</html>
<?php

require ('connect.php');
$type = $_POST['type'];

if ($type == "contact_update") {
    @$title = mysqli_real_escape_string($con, $_REQUEST['title']);
    @$url = mysqli_real_escape_string($con, $_REQUEST['url']);
    @$content = mysqli_real_escape_string($con, $_REQUEST['content']);
    @$image = mysqli_real_escape_string($con, $_REQUEST['image']);
    @$published_at = mysqli_real_escape_string($con, $_REQUEST['published_at']);
    @$category = mysqli_real_escape_string($con, $_REQUEST['category']);

    if (!empty($title) && !empty($url) && !empty($content) && !empty($image) && !empty($published_at) && !empty($category)) {
      $update = "UPDATE blog_post SET `title` = '$title' ,`url` = '$url' , `content` = '$content' , `image` = '$image' , `published_at` = '$published_at' , `category` = '$category' WHERE `id`='$id'";
        if (!$con)
            die("not connected");
        else {
            if (mysqli_query($con, $update)) {
                echo "<script>
                window.location='index.php';
                
                </script>";
                
            } else {
                echo "<script>
                window.location='update.php'</script>";
            }
        }
    }
}

if ($type == "contact_insert") {
    @$title = mysqli_real_escape_string($con, $_REQUEST['title']);
    @$url = mysqli_real_escape_string($con, $_REQUEST['url']);
    @$content = mysqli_real_escape_string($con, $_REQUEST['content']);
    @$image = mysqli_real_escape_string($con, $_REQUEST['image']);
    @$published_at = mysqli_real_escape_string($con, $_REQUEST['published_at']);
    @$category = mysqli_real_escape_string($con, $_REQUEST['category']);

    if (!empty($title) && !empty($url) && !empty($content) && !empty($image) && !empty($published_at) && !empty($category)) {
        
        $insert = "INSERT into blog_post (`title`, `url`,`content`,`image`,`published_at`,`category`) values('$title' ,'$url' , '$content' , '$image' , '$published_at','$category')";
        if (!$con)
            die("not connected");
        else {
            if (mysqli_query($con, $insert)) {
                echo "<script>
                window.location='index.php'</script>";
            } else {
                echo "<script>
                window.location='add_blog.php'</script>";
            }
        }
    }
}
?>