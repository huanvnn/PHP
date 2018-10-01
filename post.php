<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>



    <!-- Navigation -->
<?php include "includes/navigation.php";?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                <?php
                    if (isset($_GET['p_id'])) {
                        $post_id= $_GET['p_id'];
                    }
                    $query = "SELECT * FROM posts WHERE post_id=$post_id";
                    $select_all_post = mysqli_query($connection, $query);

                    while ($rows = mysqli_fetch_assoc($select_all_post)) {
                        $post_id = $rows['post_id'];
                        $post_title = $rows['post_title'];
                        $post_date = $rows['post_date'];
                        $post_image = $rows['post_image'];
                        $post_content = $rows['post_content'];
                        $post_author = $rows['post_author'];
                    
                    ?>
                      
                       <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo  $post_id; ?>"><?php echo  $post_title; ?></a> <!-- Title -->
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo  $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo  $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo  $post_image; ?>" alt="">
                <hr>
                <p><?php echo  $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                    
                    
                <?php    
                    
                    }
                ?>
             

                
            </div>
            
           
            <!-- Blog Sidebar Widgets Column -->
<?php include "includes/sidebar.php"; ?>
        <!-- /.row -->

        <hr>
        <!-- Blog Comments -->
        <!-- Insert comment to db -->
                <?php 
                    if (isset($_POST['create_comment'])) {
                        $comment_post_id = $post_id;
                        $comment_author =$_POST['author'];
                        $comment_email = $_POST['email'];
                       
                        $comment_status = 'Approving';
                        $comment_content=$_POST['content'];
                        

                        $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_status, comment_content) ";
                        $query.="VALUES ('$post_id', '$comment_author', '$comment_email', '$comment_status', '$comment_content' )";
                        $insert_comment_query= mysqli_query($connection, $query);
                        // if (!$insert_comment_query) {
                        //     die('query fail'.mysqli_error($connection));
                        // }

                    }
                    ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="POST" role="form">
                        <div class="form-group">
                            <label for="inputAuthor">Author</label>
                            <input type="text" name="author" id="inputAuthor" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="email" name="email" id="inputEmail" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputContent">Content</label>
                            <textarea name="content" class="form-control" rows="3" id="inputContent"></textarea>
                        </div>
                        <button name="create_comment" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->

                <?php 
                
                $query="SELECT * FROM comments WHERE comment_status='Approving' AND comment_post_id='$post_id'";
                $comment_query = mysqli_query($connection, $query);
                while ($rows = mysqli_fetch_assoc($comment_query)) {
                    $author = $rows['comment_author'];
                    $content= $rows['comment_content'];
                    
                
                ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $author; ?>
                            <small><?php echo date('d-m-y'); ?></small>
                        </h4>
                        <?php echo $content;?>
                    </div>
                </div>
                
             <?php    }?>
<?php include "includes/footer.php"; ?>      
