
<?php  
  if (isset($_POST['create_user'])) {
    $user_name = $_POST['username'];
    $user_password = $_POST['password'];
    $user_email = $_POST['email'];
    $user_role = $_POST['role'];
    
    $query = "INSERT INTO users(user_name, user_password, user_email, user_role) ";
    $query.="VALUES('$user_name', '$user_password', '$user_email', '$user_role')";
    $add_user_query = mysqli_query($connection, $query);
    if (!$add_user_query) {
      die("query fail  ".mysqli_error($connection));
    }
  }
?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="titleInput">Username</label>
    <input type="text" class="form-control"  placeholder="Username" name="username" id="titleInput">
    </div>

  <div class="form-group">
    <label for="categoryInput">Role</label>
    <!-- <input type="text" class="form-control"  placeholder="" name="cate_id" id="categoryInput"> -->
    <select name="role" id="categoryInput">
      <option value="admin"> Admin </option>
      <option value="subscriber"> Subscriber </option>
    </select>
  </div>
  <div class="form-group">
    <label for="authorInput">Password</label>
    <input type="text" class="form-control"  placeholder="" name="password" id="authorInput">
    </div>

  <div class="form-group">
    <label for="dateInput">Email</label>
    <input type="email" class="form-control"  placeholder="" name="email" id="dateInput">
    </div>
  
  <button type="submit" class="btn btn-primary" name="create_user">Adduser</button>
</form>