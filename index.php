<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>   
<?php include "includes/navigation.php";?><!-- Navigation -->
   <!-- Page Content -->
    <div class="container">
     <div class="row">
       <!-- Blog Entries Column -->
            <div class="col-md-8">
             <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
               <!-- pagination-->
                <?php 
                        $query = "SELECT * FROM posts WHERE post_status = 'published'";
                        $query_all_post = mysqli_query($connection, $query);

                        $num_row = mysqli_num_rows($query_all_post);
                        $pages = ceil($num_row/3);
                        if (isset($_GET['pages'])) {
                            $pager=$_GET['pages'];
                            $post_in_page = 3;

                            if ($pager == "" ||$pager<1|| $pager>$pages) {
                                $pager=1;
                            }else{
                                $page = $pager* 3 - $post_in_page;
                            }
                        }else {
                            $page=0;
                            $post_in_page=3;
                        }
                       
                ?>
                <?php
                    $query = "SELECT * FROM posts WHERE post_status='published' ORDER BY post_id DESC LIMIT $page, $post_in_page ";
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
                    by <a href="author_post.php?p_author=<?php echo $post_author; ?>"><?php echo  $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo  $post_date; ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo  $post_id; ?>"><img class="img-responsive" src="images/<?php echo  $post_image; ?>" alt=""></a>
                
                <hr>
                <p><?php echo  $post_content; ?></p>
                <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

                <hr>
                    
                    
                <?php    
                    
                    }
                ?>
             


                <!-- Pager -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        
                        <?php
                            $current_page=$_GET['pages'];
                            $pre = $current_page-1;
                            $next = $current_page+1;
                                echo "<li class='page-item'><a class='page-link' href='index.php?pages=$pre'>Previous</a></li>";
                            
                                    for ($i=1; $i <= $pages ; $i++) { 
                                        if ($i == $current_page) {
                                            echo "<li class='page-item active'><a class='page-link' href='index.php?pages=$i'>$i</a></li>";
                                        }else {
                                            echo "<li class='page-item'><a class='page-link' href='index.php?pages=$i'>$i</a></li>";
                                            }
                                    
                                    } 
                                echo "<li class='page-item'><a class='page-link' href='index.php?pages=$next'>Next</a></li>";

                        ?>
                        
                       
                    </ul>
                </nav>

            </div>

            <!-- Blog Sidebar Widgets Column -->
<?php include "includes/sidebar.php"; ?>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?>      
