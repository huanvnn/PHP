<?php
    function addCategory(){
           global $connection;                     
            if (isset($_POST['submit'])) {
                $cate_title = $_POST['cate_title'];
                if ($_POST['cate_title'] == "" || empty($_POST['cate_title']) ) {
                    echo "The Filed should be not empty";
                }else{
                    $query = "INSERT INTO categories(cate_title) VALUES('$cate_title') ";
                    $create_category_query = mysqli_query($connection, $query);

                    if (!$create_category_query) {
                        die('Query Failed'. mysqli_error($connection));
                    }
                }
            }
                       
    };


    function deleteCategoryByID(){
         global $connection;   
         if(isset($_GET['delete'])){
            $id = $_GET['delete'];
        
            $query = "DELETE FROM categories WHERE cate_id = $id";
            mysqli_query($connection, $query);
            header("Location:categories.php");
        }
    }

    function addPost(){
        global $connection;
         if (isset($_POST['submit_post'])) {
        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";
       $post_title = $_POST['title'];
       $post_cate_id = $_POST['cate_id'];
       $post_author = $_POST['author'];
       $post_date = date('d-m-y');
       $post_tag = $_POST['tag'];
       $post_content = mysqli_real_escape_string($connection, $_POST['content']);
       $post_image =$_FILES['image']['name'];
       $post_image_tmp =$_FILES['image']['tmp_name'];
       $post_comment_count = 1;//default

       move_uploaded_file($post_image_tmp,"../images/$post_image");


        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_tag, post_content, post_comment_count) ";
        $query.= "VALUES ('$post_cate_id', '$post_title', '$post_author', '$post_date', '$post_image', '$post_tag', '$post_content', '$post_comment_count') ";
        mysqli_query($connection, $query);
        }
    }
    
    function deletePostByID(){
        global $connection;
         if (isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $query="DELETE FROM posts WHERE post_id=$id";
            $delete_query=mysqli_query($connection, $query);
            header("Location:./posts.php");
        }
    }
    //REmenber call global $connection avieable in method.
?>