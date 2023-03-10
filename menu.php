<?php  
session_start();
include 'connectionpdo.php';
if (!$_SESSION['userlevel'] == 'Admin') {
        header("Location: index.php");
    }else{
    

$query = "SELECT * FROM food";  
$stmt = $conn->query($query);

$searchErr = '';
$food_details='';

if(isset($_POST['save'])) {
    if(!empty($_POST['search'])) {
        $search = $_POST['search'];
        $stmt = $conn->prepare("SELECT * FROM food WHERE Food_ID LIKE :search OR FoodName LIKE :search OR FoodType LIKE :search");
        $stmt->execute(array(':search' => "%$search%"));
        $food_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
//        $searchErr = "Please enter the information";
    }    
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>
            Menu
        </title>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <meta charset = "utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="csstest.css">
         <link rel="stylesheet" href="menucss.css">
         <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
         <script src="bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.js"></script>
         
    </head>
<header>
    <nav>
           
            <img class= "logo rounded" src="pic/lll2.png" alt="LOGO">
           <div class = "container headcon">
                 
               
               <a href="indexadmin.php" class="btn btn-info a"> หน้าเเรก</a>
               
                <a href="menu.php" class="btn btn-info b">รายการอาหาร</a>
                
                <a href="menu_emp.php" class="btn btn-info c">พนักงาน</a>
                
                <a href="menu_order.php" class="btn btn-info d">ออเดอรฺ์</a>
                
                <a href="menu_Bill.php" class="btn btn-info e">บิล</a>
                
<!--                <a href="#" class="btn btn-info d">ติดต่อเรา</a>-->
                

                
           </div>
<!
-->
               <form class="form-horizontal for" action="#" method="post">
                    <div class="row">
                        <div class="form-group">
           
                            <div class="col-sm-10 search">
                                  <input type="text" class="form-control" name="search" placeholder="ใส่ข้อความเพื่อค้นหา">
                            </div>
                            <div class="col-sm-2 but">
                                  <button type="submit" name="save" class="btn btn-success btn-sm" >ค้นหา</button>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <span class="error" style="color:red;"> <?php echo $searchErr;?></span>
                        </div>
         
                    </div>
                </form>
        </nav>
        
  </header>



<body>
  <div class="home-news-container container">
           <div class="row row-head justify-content-center">
               <div class="col-lg-20 col-6 new-item form text-center">
                       <div class="menu">Menu</div>
               </div>
            </div>
    </div>
    <a href="add.php" class="btn btn-success mb-3 ad">Add+</a>           
  <table border="1" cellspacing="0" cellpadding="0" class="table table-dark table-hover align-middle">  
    <tr class="heading">
          
        <th class='tabgP'>ID</th>     
        <th class='tabgG'>FoodName</th>  
        <th class='tabgP'>FoodType</th>
        <th class='tabgG'>Price</th> 
        <th class='tabgP'>Image</th> 
        <th class='text-warning'>Edit</th>
        <th class='text-danger'>Delete</th>
           
    </tr>
      
    <?php   
    $i = 1;
    if (!empty($food_details)) {  
        foreach ($food_details as $result) {  
            echo "  
                <tr class='data'>  
                    
                    <td>".$result['Food_ID']."</td>  
                    <td>".$result['FoodName']."</td>  
                    <td>".$result['FoodType']."</td>
                    <td>".$result['Price']." Baht</td>
                    <td><img src='upload/".$result['Image']."' width='100px' height='100px' alt=''></td>
                    <td><a href='editpage.php?update_id=".$result['Food_ID']."' class='btn btn-warning'>Edit</a></td>
                    <td>
    <a href='delete.php?id=".$result['Food_ID']."' id='btn' onclick='return confirm(\"ต้องการลบรายการอาหารนี้ออกหรือไม่\")'>Delete</a>
</td>

                </tr>";  
        }  
    } else if (!empty($searchErr)) {
        echo "<tr><td colspan='7'>".$searchErr."</td></tr>";
    } else {
        
    }
    if ($stmt->rowCount() > 0) {  
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {  
            echo "  
                <tr class='data'>  
     
    <td>".$result['Food_ID']."</td>  
    <td>".$result['FoodName']."</td>  
    <td>".$result['FoodType']."</td>
    <td>".$result['Price']." Baht</td>
    <td><img src='upload/".$result['Image']."' width='100px' height='100px' alt=''></td>
    <td><a href='editpage.php?update_id=".$result['Food_ID']."' class='btn btn-warning'>Edit</a></td>
    <td>
    <a href='delete.php?id=".$result['Food_ID']."' id='btn' onclick='return confirm(\"ต้องการลบรายการอาหารนี้ออกหรือไม่\")'>Delete</a>
</td>

</tr>";   
        }  
    }  
?>
</table>
<!--<img class= "adm2" src="pic/ad2.png">-->
 



<?php include_once("foot.php"); ?>
<?php } ?>