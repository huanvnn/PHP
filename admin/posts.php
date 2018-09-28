<?php include "includes/admin_header.php"; ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
                            <small>Author</small>
                        </h1>
                    </div>

                    <?php
                        if (isset($_GET['source'])) {
                            $suorce = $_GET['source'];
                        }
                        switch ($suorce) {
                            case 'add_post':
                                include"./includes/add_post.php";   
                                break;
                            
                            case '314':
                                echo "N 314";
                                break;
                            
                            case '324':
                                echo "N 324";
                                break;
                            
                            default:
                             // view all posts 
                             include"./includes/view_all_posts.php";    
                                break;
                        }
                     ?> 
   
                    
                </div>
                
                <!-- /.row -->
              

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>