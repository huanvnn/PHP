  <table class= "table table-bordered table-hover">
        <thead>
            <tr>
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
        $query= "SELECT * FROM posts";
        $all_pots_query = mysqli_query($connection, $query);

        while ($rows = mysqli_fetch_assoc($all_pots_query)) {
            $post_id = $rows['post_id'];
            $post_category_id =  $rows['post_category_id'];
            $post_title =$rows['post_title'];
            $post_author = $rows['post_author'];
            $post_date= $rows['post_date'];
            $post_image= $rows['post_image'];
            $post_tag=$rows['post_tag'];
            $post_content = $rows['post_content'];
            $post_comment_count=$rows['post)comment_count'];
            $post_status = $rows['post_status'];

            echo   "<tr>";
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
            echo   "<td>$post_content</td>";
            echo   "<td>$post_comment_count</td>";
            echo   "<td>$post_status</td>";
            echo    "<td><a href='posts.php?source=edit_post&p_id=$post_id'>Edit</a></td>";
            echo    "<td><a href='posts.php?delete=$post_id'>Delete</a></td>";             
            echo "</tr>";
      }
      ?>
    <?php
       deletePostByID();
    ?>
    </tbody>
</table> 