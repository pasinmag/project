<?php 
    session_start();
    if ($_SESSION['userlevel'] != 'Admin') {
    header("Location: indexuser.php");
}else{
require_once('connectionpdo.php');

if (isset($_POST['btn_insertemp'])) {
    
    $Employee_ID = $_POST['txt_EmployeeID'];
    $First_nameEm = $_POST['txt_Firstname'];
    $Last_nameEm = $_POST['txt_Lastname'];
    
    $imageemp_file = $_FILES['txt_file']['name'];
    $type = $_FILES['txt_file']['type'];
    $size = $_FILES['txt_file']['size'];
    $temp = $_FILES['txt_file']['tmp_name'];
    
    if (empty($Employee_ID)) {
        $errorMsg = "กรุณาใส่ EmployeeID";
    } else if (empty($First_nameEm)) {
        $errorMsg = "กรุณาใส่ Firstname";
    } else if (empty($Last_nameEm)) {
        $errorMsg = "กรุณาใส่ Lastname";
    }  else if (empty($imageemp_file)) {
        $errorMsg = "กรุณาเลือกไฟล์ Image";
    } else {
        try {
            $path = "uploademp/" . $imageemp_file; // set upload folder path

            if (!file_exists($path)) { // check file not exist in your upload folder path
                if ($size < 5000000) { // check file size 5MB
                    move_uploaded_file($temp, 'uploademp/'.$imageemp_file); // move uploaded file temporary directory to your upload folder
                } else {
                    $errorMsg = "ไฟล์ของคุณมีขนาดใหญ่เกินไป กรุณาอัพโหลดไฟล์ขนาดไม่เกิน 5 MB"; // error message file size larger than 5mb
                }
            } else {
                $errorMsg = "ไฟล์นี้มีอยู่แล้วในโฟลเดอร์ กรุณาเปลี่ยนชื่อไฟล์และอัพโหลดอีกครั้ง"; // error message file already exists in your upload folder path
            }

            if (!isset($errorMsg)) {
                $insert_stmt = $conn->prepare("INSERT INTO employee(Employee_ID, First_nameEm ,Last_nameEm, Image_emp) VALUES (:EID,:Fname, :Lname, :image)");
                $insert_stmt->bindParam(':EID', $Employee_ID);
                $insert_stmt->bindParam(':Fname', $First_nameEm);
                $insert_stmt->bindParam(':Lname', $Last_nameEm);
                $insert_stmt->bindParam(':image', $imageemp_file);

                if ($insert_stmt->execute()) {
                    $insertMsg = "เพิ่มรายการสำเร็จ!!...";
                    header("refresh:2;menu.php");
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
    <div class="display-3 text-center">Add Employee</div>

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
                    <label for="EmployeeID" class="col-sm-3 control-label">EmployeeID</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_EmployeeID" class="form-control t" placeholder="ใส่ EmployeeID">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="Firstname" class="col-sm-3 control-label">Firstname</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_Firstname" class="form-control t" placeholder="ใส่ Firstname">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="Lastname" class="col-sm-3 control-label">Lastname</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_Lastname" class="form-control t" placeholder="ใส่ Lastname">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="name" class="col-sm-3 control-label">File</label>
            <div class="col-sm-9">
                <input type="file" name="txt_file" class="form-control t">
            </div>
                </div>
            </div>
            
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_insertemp" class="btn btn-success ton" value="Insert">
                    <a href="menu_emp.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>


    </form> 
 
  
    


<?php include_once("foot.php"); ?>-->
<?php } ?>