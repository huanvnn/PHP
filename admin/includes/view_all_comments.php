
  <table class= "table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title Post</th>
                <th>Author</th>
                <th>Email</th>
                <th>Status</th>
                <th>Content</th>
                <th>Approving</th>
                <th>Unapproving</th>
            </tr>
        </thead>
        <tbody>
        <?php
        //change status of comment

        if (isset($_GET['approving'])) {
            $comment_id = $_GET['approving'];
            $query = "UPDATE comments SET comment_status='Approving' WHERE comment_id = $comment_id";
            $excute_query =mysqli_query($connection,$query);
            header("Location: comments.php");
        }
        ?>
        <?php
        if (isset($_GET['unapproving'])) {
            $comment_id = $_GET['unapproving'];
            $query = "UPDATE comments SET comment_status='Unapproving' WHERE comment_id = $comment_id";
            $excute_query =mysqli_query($connection,$query);
            header("Location: comments.php");
        }
        ?>
        <?php 
            //delete comment

            if (isset($_GET['delete'])) {
                $the_comment_id = $_GET['delete'];
                $query = "DELETE FROM comments WHERE comment_id = $the_comment_id";
                $del_query=mysqli_query($connection, $query);
                header("Location: comments.php");
            }
        ?>
        
        
        
        
        <?php 
        $query= "SELECT * FROM comments";
        $all_comments_query = mysqli_query($connection, $query);

        while ($rows = mysqli_fetch_assoc($all_comments_query)) {
            $comment_id = $rows['comment_id'];
            $comment_post_id =  $rows['comment_post_id'];
            $comment_author =$rows['comment_author'];
            $comment_email = $rows['comment_email'];
            $comment_status= $rows['comment_status'];
            $comment_content= $rows['comment_content'];

            echo   "<tr>";
            echo   "<td> $comment_id </td>"; 
            
            $query = "SELECT * FROM posts WHERE post_id='$comment_post_id'";
            $result_query=mysqli_query($connection, $query);
            while ($rows = mysqli_fetch_assoc($result_query)) {
                $id_post=$rows['post_id'];
                $post_title=$rows['post_title'];
                echo   "<td><a href='../post.php?p_id=$id_post'>$post_title </a> </td>";
            }

            
            echo   "<td> $comment_author</td>";
            echo   "<td> $comment_email</td>";
            echo   "<td>$comment_status</td>";
            echo   "<td>$comment_content</td>";
            echo   "<td><a href='comments.php?approving=$comment_id'>Approving</a></td>";
            echo   "<td><a href='comments.php?unapproving=$comment_id'>Unaproving</a></td>";
            echo    "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";             
            echo "</tr>";
      }
      ?>
    </tbody>
</table> 