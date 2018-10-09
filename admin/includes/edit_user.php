<?php 
//hiển thị dữ liệu vào form Edit
    
    $id = $_GET['user_id'];
    $query = "SELECT * FROM users WHERE user_id=$id";
    $edit_user_query = mysqli_query($connection, $query);
    while ($rows = mysqli_fetch_assoc($edit_user_query)) {
      $username = $rows['user_name'];
      $passwrod = $rows['user_password'];
      $email = $rows['user_email'];
      $role = $rows['user_role'];
    }
//edit
if (isset($_POST['edit_user'])) {
    $user_name = $_POST['username'];
    $salt= '$6$rounds=5000$usesomesillystringforsalt$';
    $user_password = $_POST['password'];
    $user_password = crypt($user_password, $salt);
    $user_email = $_POST['email'];
    $user_role = $_POST['role'];
}else{
    $user_name = $username;
    $user_password = $passwrod;
    $user_email =  $email;
    $user_role = $role;
}
  $query = "UPDATE users SET user_name = '$user_name', user_password = '$user_password', user_email= '$user_email', user_role = '$user_role' WHERE user_id = $id ";
  $excute = mysqli_query($connection, $query);

?>
<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="titleInput">Username</label>
    <input type="text" class="form-control"  placeholder="Username" name="username" id="titleInput" value = "<?php echo $username; ?>">
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
    <input type="text" class="form-control"  placeholder="" name="password" id="authorInput" value = "<?php echo $passwrod; ?>">
    </div>

  <div class="form-group">
    <label for="dateInput">Email</label>
    <input type="email" class="form-control"  placeholder="" name="email" id="dateInput" value = "<?php echo $email; ?>">
    </div>
  <button type="submit" class="btn btn-primary" name="edit_user">Update</button>
</form>


