<?php 

    session_start();
    require_once('connectionmysql.php');
    if ($_SESSION['userlevel'] != 'Admin') {
    header("Location: indexuser.php");
}else{
        $User_id = $_SESSION['customerid'];
        $query = "SELECT * FROM customer WHERE customer_ID ='$User_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        
?>
<?php include_once("head.php"); ?>
    <body>
        <header>
            
        </header>
        
        <nav>
           
            <img class= "logo rounded text-center" src="pic/lll2.png" alt="LOGO">
           <div class = "container headcon">
                 
               
               <a href="indexadmin.php" class="btn btn-info a"> หน้าเเรก</a>
               
                <a href="menu.php" class="btn btn-info b">รายการอาหาร</a>
                
                <a href="menu_emp.php" class="btn btn-info c">พนักงาน</a>
                
                <a href="menu_order.php" class="btn btn-info d">ออเดอรฺ์</a>
                
                <a href="menu_Bill.php" class="btn btn-info e">บิล</a>
                
<!--                <a href="#" class="btn btn-info d">ติดต่อเรา</a>-->
                
                

                
           </div>
             
              
              
              
        <p><a href="logout.php" class="btn btn-danger">Logout</a></p>
        </nav>
        <div class="home-news-container container">
           <div class="row row-head justify-content-center">
               <div class="col-lg-20 col-6 new-item form text-center">
                    
                        
                        <img class= "adm" src="pic/ad.png">
                        
                </div>
                
                    
            </div>
            <div class="row row-head justify-content-center">
               <div class="col-lg-20 col-6 new-itemuser form text-center">
                    
                        <h3 class="mt-4 hed">Welcome <?php echo $row['First_name'] . ' ' . $row['Last_name'] ?>
                            
                        <div class="statusdiv row ">
                        <div class="status1 col-6 ">Status </div>:
                        <div class="statusadmin col-3"><?php echo $row['User_level']?> </div>
                        </div>
                        </h3>
                        
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