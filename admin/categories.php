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
                    <div class="col-lg-6">
<!-- Add category-->
                <?php addCategory(); ?>
                        <form action="" method="POST">
                            <label for="cate_title">Add Category</label>
                            <div class="from-group">
                                <input type="text" class= "form-control" name="cate_title">
                            </div>
                            <div class="from-group">
                                <input type="submit" class= "btn btn-primary" name="submit" value="Add Category">
                            </div>
                         </form>



 <!-- Edit category --> <?php include"includes/edit_categories.php"; ?>
                        
                        
                        </div>


    <!-- display all categories -->
                <div class="col-lg-6">
    <?php 
                $query = "SELECT * FROM categories";
                $all_category = mysqli_query($connection, $query);


    ?>
                        <table class = "table  table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Categoty</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php 
                while($rows = mysqli_fetch_assoc($all_category)){
                $cate_title = $rows['cate_title'];
                $cate_id    = $rows['cate_id'];
                                             
    
    ?>   
                  <tr>
                                    <td><?php echo $cate_id; ?></td>
                                    <td><?php echo $cate_title; ?></td>
                                    <td><a href="categories.php?delete=<?php echo $cate_id; ?>">Delete</a></td>
                                    <td><a href="categories.php?edit=<?php echo $cate_id; ?>">Edit</a></td>
                    </tr>  
                               
    <?php                
                }         
                
    ?>
    <!-- Delete Category -->      
    <?php 
       deleteCategoryByID();
    ?>                
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- /.row -->
              

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>