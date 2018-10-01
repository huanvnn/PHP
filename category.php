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
                if (isset($_GET['cate_id'])) {
                  $category_id_get= $_GET['cate_id'];
                }
                    $query = "SELECT * FROM posts WHERE post_category_id = $category_id_get";
                    $select_all_post = mysqli_query($connection, $query);

                    while ($rows = mysqli_fetch_assoc($select_all_post)) {
                        $post_id = $rows['post_id'];
                        $post_title = $rows['post_title'];
                        $post_date = $rows['post_date'];
                        $post_image = $rows['post_image'];
                        $post_content = substr($rows['post_content'],0,150);
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
             


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
<?php include "includes/sidebar.php"; ?>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?>      
