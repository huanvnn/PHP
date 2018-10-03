  <table class= "table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>UserName</th>
                <th>PassWord</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $query= "SELECT * FROM users";
        $all_users_query = mysqli_query($connection, $query);

        while ($rows = mysqli_fetch_assoc($all_users_query)) {
            $user_id = $rows['user_id'];
            $user_name =  $rows['user_name'];
            $user_password = md5($rows['user_password']);
            $user_email = $rows['user_email'];
            $user_role=$rows['user_role'];
            echo   "<tr>";
            echo   "<td> $user_id </td>"; 
            echo   "<td> $user_name </td>";
            echo   "<td>$user_password </td>";
            echo   "<td> $user_email</td>";
            echo   "<td>$user_role</td>"; 
            echo    "<td><a href='users.php?source=edit_user&user_id=$user_id'>Edit</a></td>";
            echo    "<td><a href='users.php?delete=$user_id'>Delete</a></td>";             
            echo "</tr>";
      }

      if (isset($_GET['delete'])) {
          $id=$_GET['delete'];
          $query= "DELETE FROM users WHERE user_id = $id";
          $delete_query= mysqli_query($connection, $query);
          header("Location:users.php");
      }
      ?>
    </tbody>
</table> 