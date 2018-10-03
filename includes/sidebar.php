<div class="col-md-4">
                
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="POST">
                        <div class="input-group">
                            
                                <input type="text" name = "search" class="form-control">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit" name="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>

            <!-- Login Form -->


            <div class="well">
                    <h4>Login</h4>
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" id="inputUser" placeholder="User Name" >
                        </div>      
                       <div class="form-group">
                            <input type="password" name = "password" class="form-control" placeholder="Password">
                                   
                        </div>
                        <input class="btn btn-primary" type="submit" name="login" value="Login">   
                    </form>
                    <!-- /.input-group -->
                </div>







                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php 
                                    $query = "SELECT * FROM categories ";
                                    $all_category_from_categorie_table = mysqli_query($connection, $query);

                                    while($rows = mysqli_fetch_assoc($all_category_from_categorie_table)){
                                        $cate_title = $rows['cate_title'];
                                        $cate_id = $rows['cate_id'];
                                        
                                        echo "<li> <a href='category.php?cate_id=$cate_id'> $cate_title </a></li>";
                                    }
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                       
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>