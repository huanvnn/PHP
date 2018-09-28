<?php 
    $connection = mysqli_connect('localhost', 'root', '', 'cms');
    if(!$connection){
        die("Connection Failed".mysqli_error($connection));
    }
    // else{
    //     echo  "connected"; 
    //     }
    
   
?>