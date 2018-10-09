<?php //session_start(); ?>
<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
 <!-- Navigation -->    
<?php  include "includes/navigation.php"; ?>

<?php
    if (isset($_POST['submit'])) {
        $user_name = $_POST['username'];
        $user_password = $_POST['password'];
        $user_email = $_POST['email'];
        $user_name = mysqli_real_escape_string($connection, $user_name);
        $user_password = mysqli_real_escape_string($connection, $user_password);
        $user_email = mysqli_real_escape_string($connection, $user_email);
        
        //lay salt
       $salt= '$6$rounds=5000$usesomesillystringforsalt$';
       $user_password = crypt($user_password, $salt);
        
        $query ="INSERT INTO users(user_name, user_password, user_email) VALUES ('$user_name', '$user_password', '$user_email')";
        $registration_query = mysqli_query($connection, $query);


    }
?>
<!-- Page Content -->
    <div class="container">
    
        <section id="login">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="form-wrap">
                        <h1>Register</h1>
                            <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                                <div class="form-group">
                                    <label for="username" class="sr-only">username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                                </div>
                        
                                <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                            </form>
                        
                        </div>
                    </div> <!-- /.col-xs-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>


        <hr>



<?php include "includes/footer.php";?>
