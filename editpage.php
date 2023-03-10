<?php 
    session_start();
    require_once('connectionmysql.php');
    if ($_SESSION['userlevel'] != 'Admin') {
    header("Location: indexuser.php");
}else{
    if (isset($_REQUEST['update_id'])) {
        try {
            $id = $_REQUEST['update_id'];
            $select_stmt = $conn->prepare("SELECT * FROM food WHERE Food_ID = ?");
            $select_stmt->bind_param('i', $id);
            $select_stmt->execute();
            $result = $select_stmt->get_result();
            $row = $result->fetch_assoc();
            extract($row);
        } catch(mysqli_sql_exception $e) {
            $e->getMessage();
        }
    }

    if (isset($_REQUEST['btn_update'])) {
        $Foodname_up = $_REQUEST['txt_Foodname'];
        $FoodType_up  = $_REQUEST['txt_FoodType'];
        $Price_up  = $_REQUEST['txt_Price'];

        $image_file = $_FILES['txt_file']['name'];
        $type = $_FILES['txt_file']['type'];
        $size = $_FILES['txt_file']['size'];
        $temp = $_FILES['txt_file']['tmp_name'];

        if (empty($Foodname_up)) {
            $errorMsg = "กรุณาใส่ Foodname";
        } else if (empty($FoodType_up)) {
            $errorMsg = "กรุณาใส่ FoodType";
        } else if (empty($Price_up)) {
            $errorMsg = "กรุณาใส่ Price";
        } else {
            try {
                $path = "upload/" . $image_file; // set upload folder path

                if (!file_exists($path)) { // check file not exist in your upload folder path
                    if ($size < 5000000) { // check file size 5MB
                        move_uploaded_file($temp, 'upload/'.$image_file); // move uploaded file temporary directory to your upload folder
                    } else {
                        $errorMsg = "ไฟล์ของคุณมีขนาดใหญ่เกินไป กรุณาอัพโหลดไฟล์ขนาดไม่เกิน 5 MB"; // error message file size larger than 5mb
                    }
                } else {
                    $errorMsg = "ไฟล์นี้มีอยู่แล้วในโฟลเดอร์ กรุณาเปลี่ยนชื่อไฟล์และอัพโหลดอีกครั้ง"; // error message file already exists in your upload folder path
                }

                if (!isset($errorMsg)) {
                    $update_stmt = $conn->prepare("UPDATE food SET FoodName = ?, FoodType = ?, Price = ?, Image = ? WHERE Food_ID = ?");
                    $update_stmt->bind_param('ssdsi', $Foodname_up, $FoodType_up, $Price_up, $image_file, $id);

                    if ($update_stmt->execute()) {
                        $updateMsg = "เเก้ไขรายการสำเร็จ!!...";
                        header("refresh:2;menu.php");
                    }
                }
            } catch(mysqli_sql_exception $e) {
            $e->getMessage();
        }
            
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Edit Order
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
        </nav>
        
  </header>

<body>
  
    <div class="container con">
    <div class="display-3 text-center">Edit Menu</div>

    <?php 
         if (isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong>Wrong! <?php echo $errorMsg; ?></strong>
        </div>
    <?php } ?>
    

    <?php 
         if (isset($updateMsg)) {
    ?>
        <div class="alert alert-success">
            <strong>Success! <?php echo $updateMsg; ?></strong>
        </div>
    <?php } ?>

    <form method="post" class="form-horizontal mt-5" enctype="multipart/form-data">
            
            <div class="form-group text-center">
                <div class="row">
                    <label for="Foodname" class="col-sm-3 control-label">Foodname</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_Foodname" class="form-control t" value="<?php echo $FoodName; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="FoodType" class="col-sm-3 control-label">FoodType</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_FoodType" class="form-control t" value="<?php echo $FoodType; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="Price" class="col-sm-3 control-label">Price</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_Price" class="form-control t" value="<?php echo $Price; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="name" class="col-sm-3 control-label">File</label>
            <div class="col-sm-9">
                <input type="file" name="txt_file" class="form-control t" value="<?php echo $image; ?>">
                <p>
                   
                </p>
            </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_update" class="btn btn-success ton" value="Update">
                    <a href="menu.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>


    </form> 
 
  
    


<?php include_once("foot.php"); ?>
<?php } ?>