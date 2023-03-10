<?php   
session_start();
if ($_SESSION['userlevel'] != 'Admin') {
    header("Location: indexuser.php");
}else{
 include 'connectionmysql.php';  
 if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM food WHERE Food_ID = '$id'";  
      $run = mysqli_query($conn,$query);  
      if ($run) {  
           header('location:menu.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }  
 }  
 ?>
 <?php } ?>  