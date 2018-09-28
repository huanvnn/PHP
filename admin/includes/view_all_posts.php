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
        ?>       

            <tr>
                <td><?php echo $rows['post_id']; ?></td>
                <td><?php echo $rows['post_category_id']; ?></td>
                <td><?php echo $rows['post_title']; ?></td>
                <td><?php echo $rows['post_author']; ?></td>
                <td><?php echo $rows['post_date']; ?></td>
                <td><img class="img-responsive" src="../images/<?php echo $rows['post_image']; ?>" ></td>
                <td><?php echo $rows['post_tag']; ?></td>
                <td><?php echo $rows['post_content']; ?></td>
                <td><?php echo $rows['post_comment_count']; ?></td>
                <td><?php echo $rows['post_status']; ?></td>
                <td><a href="posts.php?delete=<?php echo $rows['post_id'];?>">Delete</a></td>
              
            </tr>

    <?php  }?>
    <?php
       deletePostByID();
    ?>
    </tbody>
</table> 