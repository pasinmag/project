<?php  
session_start();
include 'connectionpdo.php';
if (!$_SESSION['userlevel'] == 'Admin') {
        header("Location: index.php");
    }else{
    

$query = "SELECT * FROM employee";  
$stmt = $conn->query($query);

$searchErr = '';
$employee_details='';

if(isset($_POST['save'])) {
    if(!empty($_POST['search'])) {
        $search = $_POST['search'];
        $stmt = $conn->prepare("SELECT * FROM employee WHERE Employee_ID LIKE :search OR First_nameEm LIKE :search OR Last_nameEm LIKE :search");
        $stmt->execute(array(':search' => "%$search%"));
        $employee_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
  
  <div class="home-news-container container">
           <div class="row row-head justify-content-center">
               <div class="col-lg-20 col-6 new-item form text-center">
                       <div class="menu">Employee</div>
               </div>
            </div>
    </div>

<a href="add_emp.php" class="btn btn-success mb-3 ad">Add+</a>

<body>
  
  <table border="1" cellspacing="0" cellpadding="0" class="table table-dark table-hover align-middle">  
    <tr class="heading">
          
        <th class='tabgG'>ID</th>     
        <th class='tabgP'>Firstname</th>  
        <th class='tabgG'>Lastname</th> 
        <th class='tabgP'>Image</th> 
        <th class='text-warning'>Edit</th>
        <th class='text-danger'>Delete</th>
           
    </tr>
      
    <?php   
    $i = 1;
    if (!empty($employee_details)) {  
        foreach ($employee_details as $result) {  
            echo "  
                <tr class='data'>  
                    
                    <td>".$result['Employee_ID']."</td>  
                    <td>".$result['First_nameEm']."</td>  
                    <td>".$result['Last_nameEm']."</td>
                    <td><img src='uploademp/".$result['Image_emp']."' width='150px' height='100px' alt=''></td>
                    <td><a href='edit_emp.php?update_idemp=".$result['Employee_ID']."' class='btn btn-warning'>Edit</a></td>
                    <td>
    <a href='delete_emp.php?id=".$result['Employee_ID']."' id='btn' onclick='return confirm(\"ต้องการลบรายการอาหารนี้ออกหรือไม่\")'>Delete</a>
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
                    
                    <td>".$result['Employee_ID']."</td>  
                    <td>".$result['First_nameEm']."</td>  
                    <td>".$result['Last_nameEm']."</td>
                    <td><img src='uploademp/".$result['Image_emp']."' width='110px' height='100px' alt=''></td>
                    <td><a href='edit_emp.php?update_idemp=".$result['Employee_ID']."' class='btn btn-warning'>Edit</a></td>
                    <td>
    <a href='delete_emp.php?id=".$result['Employee_ID']."' id='btn' onclick='return confirm(\"ต้องการลบรายการอาหารนี้ออกหรือไม่\")'>Delete</a>
</td>

                </tr>";   
        }  
    }  
?>
</table>
<!--<img class= "adm2" src="pic/ad2.png">-->
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
 



<?php include_once("foot.php"); ?>
<?php } ?>