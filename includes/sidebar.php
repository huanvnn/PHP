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

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php 
                                    $query = "SELECT * FROM categories LIMIT 4 ";
                                    $all_category_from_categorie_table = mysqli_query($connection, $query);

                                    while($rows = mysqli_fetch_assoc($all_category_from_categorie_table)){
                                        $cate_title = $rows['cate_title'];
                                        
                                        echo "<li> <a href='#'> $cate_title </a></li>";
                                    }
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                   <?php 
                                    $query = "SELECT * FROM categories LIMIT 5, 4 ";
                                    $all_category_from_categorie_table = mysqli_query($connection, $query);

                                    while($rows = mysqli_fetch_assoc($all_category_from_categorie_table)){
                                        $cate_title = $rows['cate_title'];
                                        
                                        echo "<li> <a href='#'> $cate_title </a></li>";
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