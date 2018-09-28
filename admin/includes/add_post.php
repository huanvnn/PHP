
<?php  
   addPost();
?>



<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="titleInput">Title</label>
    <input type="text" class="form-control"  placeholder="Title" name="title" id="titleInput">
    </div>

  <div class="form-group">
    <label for="categoryInput">Category</label>
    <input type="text" class="form-control"  placeholder="" name="cate_id" id="categoryInput">
    </div>

  <div class="form-group">
    <label for="authorInput">Author</label>
    <input type="text" class="form-control"  placeholder="" name="author" id="authorInput">
    </div>

  <div class="form-group">
    <label for="dateInput">Date</label>
    <input type="date" class="form-control"  placeholder="" name="date" id="dateInput">
    </div>

  <div class="form-group">
    <label for="tagInput">Tag</label>
    <input type="text" class="form-control"  placeholder="" name="tag" id="tagInput">
    </div>

    <div class="form-group">
    <label for="exampleInputFile">Image</label>
    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="image">
  </div>
  
  <div class="form-group">
    <label for="exampleTextarea">Content</label>
    <textarea class="form-control" id="exampleTextarea" rows="4" name="content"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary" name="submit_post">Pushlist</button>
</form>