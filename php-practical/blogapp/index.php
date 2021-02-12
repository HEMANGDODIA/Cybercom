<?php 
include"connect.php";
include('./Templates/header.php');
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="CSS/istyle.css" /></head>
<body>

<div class="header">
  
  <div class="header-right">
    <a class="active" href="category.php">Manage Category</a>
    <a href="myprofile.php">My Profile</a>
    <a href="login.php">Log out</a>
  </div>
</div>
<div class="main-content">
        <h1>Blog Posts</h1>

        <div id="user_table" class="table-responsive">
       </div>

         <?php

        $per_page_record = 5;
        if (isset($_GET["page"])) {
            $page  = $_GET["page"];
        } else {
            $page = 1;
        }

        $start_from = ($page - 1) * $per_page_record;

        $query = "SELECT * FROM blog_post LIMIT $start_from, $per_page_record";
        $rs_result = mysqli_query($con, $query);
        ?>
        <form action="add_blog.php" method="POST">
            <input type="submit" name="submit" value="Add New Blog">
        </form>

        <div class="message"></div>
        
        <table class="table" id="table1" name="table1">
            <thead class="thead">
                <tr>
                    <th>Post ID</th>
                    <th>Category Name</th>
                    <th>Title</th>
                    <th>Published Date</th>
                    <th>Action</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            
            
                <?php
                
                if (@$result = mysqli_query($con, $query)) {
                    while ($row = mysqli_fetch_array($result)) { ?>
                      
                            <td><?php echo $row['id']; ?>
                            <td><?php echo $row['category']; ?>
                            <td><?php echo $row['title']; ?>
                            <td><?php echo $row['published_at']; ?>
                          <!-- <td><?//php echo $row['url']; ?>
                            <td><?//php echo $row['content']; ?>
                            <td><?//php echo $row['image']; ?>  -->
                            
 
                            <td>
                                <form action="update.php" method="post">
                                    <input type="text" style="display:none;" name="type" value="contact_update">
                                    <input type="text" style="display:none;" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="text" style="display:none;" name="title" value="<?php echo $row['title']; ?>">
                                    <input type="text" style="display:none;" name="url" value="<?php echo $row['url']; ?>">
                                    <input type="text" style="display:none;" name="contact" value="<?php echo $row['content']; ?>">
                                    <input type="text" style="display:none;" name="image" value="<?php echo $row['image']; ?>">
                                    <input type="text" style="display:none;" name="published_at" value="<?php echo $row['published_at']; ?>">
                                    
                                    <input type="text" style="display:none;" name="category" value="<?php echo $row['category']; ?>">
                                    <div>
                                        <button class='item-update' title='Update' type="submit">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    
                                </form>
                            </td>
                            <td>
                                <div>
                                    <?php echo "<a href='#' class='delete' data-id='" . $row['id'] . "'><button class='item-delete'><i class='fa fa-trash' aria-hidden='true'></i></button></a>"; ?>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                }
                
                
                
                
                
                
                ?>

            </tbody>
        </table>

        <div class="pagination">
            <?php
            $query = "SELECT COUNT(*) FROM blog_post";
            $rs_result = mysqli_query($con, $query);
            $row = mysqli_fetch_row($rs_result);
            $total_records = $row[0];

            echo "</br>";
            $total_pages = ceil($total_records / $per_page_record);
            $pagLink = "";

            if ($page >= 2) {
                echo "<a href='index.php?page=" . ($page - 1) . "'>  Prev </a>";
            }

            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $pagLink .= "<a class = 'active' href='index.php?page="
                        . $i . "'>" . $i . " </a>";
                } else {
                    $pagLink .= "<a href='index.php?page=" . $i . "'>   
                                                " . $i . " </a>";
                }
            };
            echo $pagLink;

            if ($page < $total_pages) {
                echo "<a href='index.php?page=" . ($page + 1) . "'>  Next </a>";
            }
            ?>
        </div>
    </div>
    

</div>
</body>
<?php include('./Templates/footer.php'); ?>

</html>
