<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>



    <!-- Navigation -->
<?php include "includes/navigation.php";?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                    if (isset($_GET['p_author'])) {
                        $post_author=$_GET['p_author'];
                
                    }
                ?>
                <h1 class="page-header">
                    <?php echo $post_author; ?>
                    <small><?php echo "'s posts"; ?></small>
                </h1>

                <?php
                    
                    $query = "SELECT * FROM posts WHERE post_author='$post_author'";
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
                    by <a href="#"><?php echo  $post_author; ?></a>
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
        
<?php include "includes/footer.php"; ?>      
