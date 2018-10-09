<?php 
    if (isset($_POST['submit'])) {
        $post_value_select = $_POST['select_option'];
         $id=$_POST['bulkId'];
        print_r($id);
        foreach ($id as $key => $value) {
            switch ($post_value_select) {
                case 'draft':
                    $query="UPDATE posts SET post_status='draft' WHERE post_id='$value'";
                    $excute= mysqli_query($connection, $query);
                    // if(!$excute)
                    // {
                    //     die("Query Fail".mysqli_error($connection));
                    // }
                    break;
                case 'published':
                    $query="UPDATE posts SET post_status='published' WHERE post_id='$value'";
                    $excute= mysqli_query($connection, $query);
                    // if(!$excute)
                    // {
                    //     die("Query Fail".mysqli_error($connection));
                    // }
                    break;
                case 'delete':
                    $query="DELETE FROM posts WHERE post_id='$value'";
                    $excute= mysqli_query($connection, $query);
                    // if(!$excute)
                    // {
                    //     die("Query Fail".mysqli_error($connection));
                    // }
                    break;
                case 'clone':
                    $query = "SELECT * FROM posts WHERE post_id='$value'";
                    $excute= mysqli_query($connection, $query);
                    while ($rows=mysqli_fetch_assoc($excute)) {
                        $post_cate_id = $rows['post_category_id'];
                        $post_title  = $rows['post_title'];

                        $post_author =$rows['post_author'];
                        $post_date = date('d-m-y');
                        $post_image =$rows['post_image'];
                        $post_tag = $rows['post_tag'];
                        $post_content = mysqli_real_escape_string($connection, $rows['post_content']);
                        $post_comment_count=0;
                        }
        
                        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_tag, post_content, post_comment_count) ";
                        $query.= "VALUES ('$post_cate_id', '$post_title', '$post_author', '$post_date', '$post_image', '$post_tag', '$post_content', '$post_comment_count') ";
                        mysqli_query($connection, $query);
                     
                    break;
                
                
                default:
                    # code...
                    break;
            }
        }
        
    }
?>


<form  action="" method="POST">
    

    <table class= "table table-bordered table-hover">
        <div class="col-sx-4">
           <select class="custom-select" id="inputGroupSelect" name = "select_option" style="width:270px;height:35px;">
                <option selected>Choose...</option>
                <option value="draft">Draft</option>
                <option value="published">Publish</option>
                <option value="delete">Delete</option>
                <option value="clone">Clone</option>
            </select>

            <button class="btn btn-success" type="submit" name="submit" >Apply</button>
        </div>
        
        <thead>
            <tr>
                <td><input type="checkbox" name="selectAllBoxes" id="selectAllBoxes"></td>
                <th>ID</th>
                <th>Category</th>
                <th>Title</th>
                <th>Author</th>
                <th>Date</th>
                <th>Image</th>
                <th>Tag</th>
                <th>Content</th>
                <th>Comment</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $query= "SELECT * FROM posts ORDER BY post_id DESC";
        $all_pots_query = mysqli_query($connection, $query);

        while ($rows = mysqli_fetch_assoc($all_pots_query)) {
            $post_id = $rows['post_id'];
            $post_category_id =  $rows['post_category_id'];
            $post_title =$rows['post_title'];
            $post_author = $rows['post_author'];
            $post_date= $rows['post_date'];
            $post_image= $rows['post_image'];
            $post_tag=$rows['post_tag'];
            $post_content =$rows['post_content'];
            $post_comment_count=$rows['post_comment_count'];
            $post_status = $rows['post_status'];

            echo   "<tr>";
            ?>
                <td><input type="checkbox" class="checkbox" name="bulkId[]" value="<?php echo $post_id;?>"></td>
            <?php
            echo   "<td> $post_id </td>"; 
            
            $query= "SELECT * FROM categories WHERE cate_id=$post_category_id";
            $query_cate = mysqli_query($connection, $query);
            while ($rows= mysqli_fetch_assoc($query_cate)) {
                $cate_id = $rows['cate_id'];
                $cate_title = $rows['cate_title'];
              
                echo   "<td> $cate_title </td>";  
            }

            

            echo   "<td> $post_title </td>";
            echo   "<td> $post_author</td>";
            echo   "<td> $post_date</td>";
            echo   "<td><img class='img-responsive' src='../images/$post_image' ></td>";
            echo   "<td>$post_tag</td>";
            echo   "<td>$post_content </td>";
            echo   "<td>$post_comment_count</td>";
            echo   "<td>$post_status</td>";
            echo    "<td><a href='posts.php?source=edit_post&p_id=$post_id'>Edit</a></td>";
            echo    "<td><a onClick=\" javascript: return confirm('What do you want delete?'); \" href='posts.php?delete=$post_id'>Delete</a></td>";             
            echo "</tr>";
        }
        ?>
        <?php
        deletePostByID();
        ?>
        </tbody>
    </table> 
</form>