<?php 

    session_start();
    require_once('connectionmysql.php');
    if (!$_SESSION['customerid']) {
        header("Location: index.php");
    } 
    else{
        $User_id = $_SESSION['customerid'];
        $query = "SELECT * FROM customer WHERE customer_ID ='$User_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Home Page
        </title>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <meta charset = "utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="csstest.css">
         <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
         <script src="bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.js"></script>
         
    </head>
    <body>
        <header>
            
        </header>
        
        <nav>
           
            <img class= "logo rounded text-center" src="pic/lll2.png" alt="LOGO">
           <div class = "container headcon">
                 
               
               <a href="indexuser.php" class="btn btn-info a"> หน้าเเรก</a>
               
                <a href="menu.php" class="btn btn-info b">รายการอาหาร</a>
                
                <a href="menu_emp.php" class="btn btn-info c">เกี่ยวกับเรา</a>
                
                <a href="#" class="btn btn-info d">ติดต่อเรา</a>
                
                

                
           </div>
             
              
              
              
        <p><a href="logout.php" class="btn btn-danger">Logout</a></p>
        </nav>
        <div class="home-news-container container">
           <div class="row row-head justify-content-center">
               <div class="col-lg-20 col-6 new-item form text-center">
                    
                        <?php  if ($_SESSION['userlevel'] == 'Admin'): ?>
                                    
                                    <img class= "adm" src="pic/ad.png">
                                    
                               
                        <?php  elseif ($_SESSION['userlevel'] == 'Member'): ?>
                                    <img class= "userpic" src="pic/user.png">
                                
                           <?php endif?>     
                        
                        
                </div>
                
                    
            </div>
            <div class="row row-head justify-content-center">
               <div class="col-lg-20 col-6 new-itemuser form text-center">
                        
                        <?php  if ($_SESSION['userlevel'] == 'Admin'): ?>
                                    
                                    <h3 class="mt-4 hed">Welcome <?php echo $row['First_name'] . ' ' . $row['Last_name'] ?>
                                        <div class="statusdiv row ">
                                        <div class="status1 col-6 ">Status </div>:
                                        <div class="statusadmin col-3"><?php echo $row['User_level']?> </div>
                                        </div>
                                    </h3>
                                    
                               
                        <?php  elseif ($_SESSION['userlevel'] == 'Member'): ?>
                                    <h3 class="mt-4 hed">Welcome <?php echo $row['First_name'] . ' ' . $row['Last_name'] ?>
                                        <div class="statusdiv row ">
                                        <div class="status1 col-6 ">Status </div>:
                                        <div class="statususer col-3"><?php echo $row['User_level']?> </div>
                                        </div>
                                    </h3>
                                
                           <?php endif?>
                        
                        
                </div>
                    
            </div>
         </div>
         <div class="row row-head justify-content-center">
               <div class="col-lg-20 col-6 new-item form text-center">
                    
                        <img class= "wt" src="pic/wel3.png">
                        
                </div>
                    
            </div>
         

        
<?php include_once("foot.php"); ?>
<?php } ?>