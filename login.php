<?php include "./includes/db.php";?>
<?php session_start(); ?>
<?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
    }
    $query = "SELECT * FROM users WHERE user_name ='$username'";
    $username_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($username_query)) {
        $db_user_name = $row['user_name'];
        $db_user_password = $row['user_password'];
        $db_role = $row['user_role'];
    }
    if ($username === $db_user_name && $password === $db_user_password) {
            $_SESSION['username']=$db_user_name;
            $_SESSION['role'] = $db_role;

         if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href='admin'>Link</a>");
        }else
        exit(header("Location:admin"));

    }{
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href='index.php'>Link</a>");
        }else
       exit(header("Location:index.php"));
    }
    
?>