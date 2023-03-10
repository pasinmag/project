<?php 
    session_start();
    if ($_SESSION['userlevel'] != 'Admin') {
    header("Location: indexuser.php");
}else{
require_once('connectionpdo.php');

if (isset($_POST['btn_insertorder'])) {
    
    $Order_ID = $_POST['txt_OrderID'];
    $Employee_ID = $_POST['txt_EmployeeID'];
    $Food_ID = $_POST['txt_FoodID'];
    $FoodName = $_POST['txt_FoodName'];
    $item = $_POST['txt_item'];
    $customer_ID = $_POST['txt_customerID'];
    
    
    if (empty($Order_ID)) {
        $errorMsg = "กรุณาใส่ OrderID";
    }else if (empty($Employee_ID)) {
        $errorMsg = "กรุณาใส่ EmployeeID";
    } else if (empty($Food_ID)) {
        $errorMsg = "กรุณาใส่ FoodID";
    } else if (empty($FoodName)) {
        $errorMsg = "กรุณาใส่ FoodName";
    }  else if (empty($item)) {
        $errorMsg = "กรุณาเลือกไฟล์ item";
    }   else if (empty($customer_ID)) {
        $errorMsg = "กรุณาเลือกไฟล์ customerID";
    }
    else {
        try {
            if (!isset($errorMsg)) {
                $insert_stmt = $conn->prepare("INSERT INTO foodorder(Order_ID,Employee_ID, Food_ID ,FoodName, items,customer_ID) VALUES (:OrID,:EID,:FID, :Fname, :it,:CID)");
                $insert_stmt->bindParam(':OrID', $Order_ID);
                $insert_stmt->bindParam(':EID', $Employee_ID);
                $insert_stmt->bindParam(':FID', $Food_ID);
                $insert_stmt->bindParam(':Fname', $FoodName);
                $insert_stmt->bindParam(':it', $item);
                $insert_stmt->bindParam(':CID', $customer_ID);
                
                if ($insert_stmt->execute()) {
                    $insertMsg = "เพิ่มรายการสำเร็จ!!...";
                    header("refresh:2;menu_order.php");
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>
        add Order
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
        </nav>
        
  </header>

<body>
  
    <div class="container con">
    <div class="display-3 text-center">Add Order</div>

    <?php 
         if (isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong>Wrong! <?php echo $errorMsg; ?></strong>
        </div>
    <?php } ?>
    

    <?php 
         if (isset($insertMsg)) {
    ?>
        <div class="alert alert-success">
            <strong>Success! <?php echo $insertMsg; ?></strong>
        </div>
    <?php } ?>

    <form method="post" class="form-horizontal mt-5" enctype="multipart/form-data">
            
            <div class="form-group text-center">
                <div class="row">
                    <label for="OrderID" class="col-sm-3 control-label">OrderID</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_OrderID" class="form-control t" placeholder="ใส่ OrderID">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="EmployeeID" class="col-sm-3 control-label">EmployeeID</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_EmployeeID" class="form-control t" placeholder="ใส่ EmployeeID">
                    </div>
                </div>
            </div>
            
            <div class="form-group text-center">
                <div class="row">
                    <label for="FoodID" class="col-sm-3 control-label">FoodID</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_FoodID" class="form-control t" placeholder="ใส่ FoodID">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="name" class="col-sm-3 control-label">FoodName</label>
            <div class="col-sm-9">
                <input type="text" name="txt_FoodName" class="form-control t" placeholder="ใส่ FoodName">
            </div>
                </div>
            </div>
            
            <div class="form-group text-center">
                <div class="row">
                    <label for="name" class="col-sm-3 control-label">item-piece</label>
            <div class="col-sm-9">
                <input type="text" name="txt_item" class="form-control t" placeholder="ใส่ item-piece">
            </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="name" class="col-sm-3 control-label">customerID</label>
            <div class="col-sm-9">
                <input type="text" name="txt_customerID" class="form-control t" placeholder="ใส่ customerID">
            </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_insertorder" class="btn btn-success ton" value="Insert">
                    <a href="menu_order.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
            


    </form> 
 
  
    


<?php include_once("foot.php"); ?>-->
<?php } ?>