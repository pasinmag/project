<?php 
        
        
        session_start();

        if (!$_POST["username"]) {
            header("location: register.php?message=กรุณาใส่ยูสเซอร์เนม");
        }
        else if (!$_POST["firstname"]) {
            header("location: register.php?message=กรุณาใส่ชื่อ");
        } 
        else if (!$_POST["lastname"]) {
            header("location: register.php?message=กรุณาใส่นามสกุล");
        } 
        else if (!$_POST["password"]) {
            header("location: register.php?message=กรุณาใส่รหัสผ่าน");
        }
        else if (!$_POST["email"]) {
            header("location: register.php?message=กรุณาใส่อีเมล");
        }
        else if (!$_POST["phonenumber"]) {
            header("location: register.php?message=กรุณาใส่เบอร์โทรศัพท์");
        }
        else{

 require_once "connectionmysql.php";
            
$username = $_POST["username"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$password = $_POST["password"];
$email = $_POST["email"];
$phonenumber = $_POST["phonenumber"];
$userlevel = "Member";

            
$user_check = "SELECT * FROM customer WHERE User_name = '$username' LIMIT 1";
$result = mysqli_query($conn, $user_check);
$user = mysqli_fetch_assoc($result);
            
if($user['username'] === $username){
    header("location: register.php?message=มีคนใช้ยูสเซอร์เนมนี้เเล้ว");
}
    $passwordenc = md5($password);

$sql = "INSERT INTO customer (User_name,First_name, Last_name,Password,Email,Phone_number,User_level)
VALUES ('$username','$firstname', '$lastname','$passwordenc', '$email','$phonenumber','$userlevel')";

if (mysqli_query($conn, $sql) === TRUE) {
  header("location: register.php?success=สมัครสมาชิกสำเร็จ");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
        }
        

        