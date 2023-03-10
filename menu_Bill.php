<?php  
session_start();
include 'connectionpdo.php';
if (!$_SESSION['userlevel'] == 'Admin') {
        header("Location: index.php");
    }else{
    

$query = "SELECT c.customer_ID,c.First_name,c.Last_name,c.Phone_number,fo.Employee_ID,SUM(f.Price*fo.items) AS Totalprice 
                    FROM foodorder fo 
                    JOIN food f ON f.Food_ID = fo.Food_ID
                    JOIN customer c ON c.customer_ID = fo.customer_ID
                    GROUP BY customer_ID
";  
$stmt = $conn->query($query);

$searchErr = '';
$food_details = array();

if(isset($_POST['save'])) {
    if(!empty($_POST['search'])) {
        $search = $_POST['search'];
        $stmt = $conn->prepare("WITH Totalprice AS (
  SELECT fo.customer_ID, SUM(f.Price*fo.items) AS Total 
  FROM foodorder fo 
  JOIN food f ON f.Food_ID = fo.Food_ID
  GROUP BY fo.customer_ID
)

SELECT c.customer_ID, c.First_name, c.Last_name, c.Phone_number, fo.Employee_ID, Totalprice.Total 
FROM customer c
JOIN foodorder fo ON c.customer_ID = fo.customer_ID
JOIN Totalprice ON c.customer_ID = Totalprice.customer_ID
WHERE c.customer_ID LIKE :search OR c.First_name LIKE :search OR c.Last_name LIKE :search OR c.Phone_number LIKE :search OR fo.Employee_ID LIKE :search OR Totalprice.Total LIKE :search
GROUP BY c.customer_ID

 ");
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
            Bill
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
  
<style>table{
    border: 0.1px;
    }
    
    .tabg1{
        
        border: 0.1px;
        color: chartreuse;
    }
    
    .tabg2{
        border-bottom-right-radius: 50px;
        border: 0.1px;
        color: aqua;
    }
    .tabg3{
        
        border-Top-left-radius: 50px;
        border: 0.1px;
        color: fuchsia;
    }
    .tabg4{
        border-Top-right-radius: 50px;
        border: 0.1px;
        color: chartreuse;
    }
    .tabg5{
        border-bottom-left-radius: 50px;
        border: 0.1px;
        
    }
    .tabg6{
        border-bottom-right-radius: 50px;
        border: 0.1px;
        
    }
    .tabgG{
        color: chartreuse;
    }
    .tabgP{
        color: fuchsia;
    }
    td{
        padding-right: 100px;
        color: aqua;
    }
</style>



<div class="home-news-container container">
           <div class="row row-head justify-content-center">
               <div class="col-lg-20 col-6 new-item form text-center">
                       <div class="menu">Bill</div>
               </div>
            </div>
            <table border="1" cellspacing="0" cellpadding="0" class="table table-dark table-hover align-middle">
               <tr class="heading">
          
        <th  class='tabg3'>CustomerID</th>
        <th  class='tabgG'>Employee_ID</th>
        <th  class='tabgP'>First_name</th>
        <th  class='tabgG'>Last_name</th>
        <th  class='tabgP'>Phone_number</th>
        <th  class='tabg4'>Total Price Per Bill</th>     
        
           
                </tr>
                <?php 
    $i = 1;
    if (!empty($food_details)) {  
        foreach ($food_details as $result) {  
            echo "<tr> 
                    <td  >".$result['customer_ID']."</td>
                    <td  >".$result['Employee_ID']."</td>
                     <td  >".$result['First_name']."</td>
                     <td  >".$result['Last_name']."</td>
                     <td  >".$result['Phone_number']."</td>
                     <td  >".$result['Total']." Baht</td>
                    
         </tr>" ;
            
        }  
    } else if (!empty($searchErr)) {
        echo "<tr><td colspan='7'>".$searchErr."</td></tr>";
    } else {
        
    }
    if ($stmt->rowCount() > 0) { 
                    
          while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
         echo "<tr> 
                    <td  >".$result['customer_ID']."</td>
                    <td  >".$result['Employee_ID']."</td>
                     <td  >".$result['First_name']."</td>
                     <td  >".$result['Last_name']."</td>
                     <td  >".$result['Phone_number']."</td>
                     <td  >".$result['Totalprice']." Baht</td>
                    
         </tr>";
          }
    }
                
                ?>
                <td class='tabg5' ></td>
                <td class='tabgG'></td>
                <td class='tabgP'></td>
                <td ></td>
                <td class='tabgP'></td>
                <td class='tabg6' ></td>
            </table>
            
    </div>


<!--<img class= "adm2" src="pic/ad2.png">-->
 



<?php include_once("foot.php"); ?>
<?php } ?>