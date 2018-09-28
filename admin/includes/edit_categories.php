    <form action="" method="POST">
                            <label for="cate_title">Edit Category</label>
                            <div class="from-group"  >
                        <?php 
                           if (isset($_GET['edit'])) {
                               $id = $_GET['edit'];
                               $query = "SELECT * FROM categories WHERE cate_id = $id";
                               $query_category_edit = mysqli_query($connection, $query);
                            while ($rows = mysqli_fetch_assoc($query_category_edit)) {
                                $cate_id= $rows['cate_id'];
                                $cate_title = $rows['cate_title'];
                           
                         ?>
                            <input type="text" class= "form-control" name="cate_title_edit" value="<?php if(isset($_GET['edit'])){echo $cate_title;}else {echo " ";} ?>" >
                        
                        <?php 
                       
                           } 
                         }
                        ?>
                         <?php //Query Update
                            if (isset($_POST['update_category'])) {
                                $id = $_GET['edit'];
                                $cate_title = $_POST['cate_title_edit'];
                                $query = "UPDATE categories SET cate_title = '$cate_title' WHERE cate_id = $id ";
                                $query_update = mysqli_query($connection, $query);
                            }

                         ?>

 
                              
                            </div>
                            <div class="from-group">
                                <?php if (isset($_GET['edit'])) {
                            echo "<input type='submit' class= 'btn btn-primary' name='update_category' value='Edit Category'>";
                        } ?>
                            </div>
                         </form>