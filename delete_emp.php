<?php   
session_start();
 include 'connectionmysql.php';
if ($_SESSION['userlevel'] != 'Admin') {
    header("Location: indexuser.php");
}else{
 if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM employee WHERE Employee_ID = '$id'";  
      $run = mysqli_query($conn,$query);  
      if ($run) {  
           header('location:menu_emp.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }  
 }  
 ?>  
 <?php } ?>  