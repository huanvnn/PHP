<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Font</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
            <?php 
                $query = "SELECT * FROM categories";
                $all_category_from_categorie_table = mysqli_query($connection, $query);

                while($rows = mysqli_fetch_assoc($all_category_from_categorie_table)){
                    $cate_title = $rows['cate_title'];
                    
                    echo "<li> <a href='#'> $cate_title </a></li>";
                }
            ?> 
                <li class="nav-item">
                    <a class="but_admin" href="admin"> Admin </a>
                </li>
                   
             <!--
                    
                    <li>
                        <a href="#">Contact</a>
                    </li> -->
                </ul>
             
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
