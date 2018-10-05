<?php 
//hiển thị dữ liệu vào form Edit
    
    $id = $_GET['p_id'];
    $query = "SELECT * FROM posts WHERE post_id=$id";
    $edit_post_query = mysqli_query($connection, $query);

    $result= mysqli_fetch_assoc($edit_post_query);
//edit
  if (isset($_POST['submit_post'])) {
    $post_category_id=$_POST['post_category_id'];
    $post_title = $_POST['title'];
    $post_author= $_POST['author'];
    $post_date = date('d-m-y');
    $post_image = $_FILES['image']['name'];
    $post_image_tmp = $_FILES['image']['tmp_name'];
     echo "<pre>";
    print_r($_FILES);
    echo "</pre>"; 
    $post_tag= $_POST['tag'];
    $post_status = $_POST['post_status'];
    $post_content=mysqli_real_escape_string($connection, $_POST['content']);

    move_uploaded_file($post_image_tmp, "../images/$post_image");
    //fix empty image
       if (empty($post_image)) {
       $query = "SELECT * FROM posts WHERE post_id = $id";
       $image = mysqli_query($connection, $query);
       while ($rows=mysqli_fetch_assoc($image)) {
        $post_image=$rows['post_image'];
         }
       }
    

      $query = "UPDATE posts SET ";
      $query.="post_category_id='$post_category_id', post_title='$post_title', post_author='$post_author', post_date='$post_date', post_image='$post_image', post_tag='$post_tag', post_content = '$post_content',post_status = '$post_status' ";
      $query.="WHERE post_id = $id ";
      $query_update_post = mysqli_query($connection, $query);
      if (!$query_update_post) {
        die('Query Failed'.mysqli_error($connection));
      }
    
  }
?>
<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="titleInput">Title</label>
    <input type="text" class="form-control"  placeholder="<?php echo $result['post_title']; ?>" name="title" id="titleInput">
    </div>

  <div class="form-group">
    <label for="categoryInput">Category</label>
      <select name="post_category_id" id="categoryInput" >

          <?php 
              $query = "SELECT * FROM categories";
              $query_category_edit = mysqli_query($connection, $query);
          while ($rows = mysqli_fetch_assoc($query_category_edit)) {
              $cate_id= $rows['cate_id'];
              $cate_title = $rows['cate_title'];
            echo  "<option value='$cate_id'> $cate_title </option>";
          }
          ?>
      
      </select>
    </div>

    <div class="form-group">
      <label for="statusInput">Status</label>
        <select name="post_status" id="statusInput" >

            <?php 
              
                $status= $result['post_status'];
                if ($status == 'draft') {
                  echo  "<option value='Published'> Published </option>";
                }{
                   echo  "<option value='draft'> Draft </option>";
                }
                   
            ?>
        
        </select>
    </div>

  <div class="form-group">
    <label for="authorInput">Author</label>
    <input type="text" class="form-control"  placeholder="" name="author" id="authorInput"value="<?php echo $result['post_author'];?>">
    </div>

  <div class="form-group">
    <label for="tagInput">Tag</label>
    <input type="text" class="form-control"  placeholder="" name="tag" id="tagInput"value="<?php echo $result['post_tag'];?>">
    </div>

    <div class="form-group">
    <label for="exampleInputFile">Image</label>
    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="image">
    <img width=300px;height=100px; src="../images/<?php echo $result['post_image'];?>">
  </div>
  
  <div class="form-group">
    <label for="exampleTextarea">Content</label>
    <textarea class="form-control" id="exampleTextarea" rows="4" name="content" >
    <?php echo $result['post_content'];?>
    </textarea>
  </div>
  
  <button type="submit" class="btn btn-primary" name="submit_post">Pushlist</button>
</form>


