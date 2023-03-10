<?php 
    
    
    session_start();

    if (isset($_POST['username'])) {

        include('connectionmysql.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordenc = md5($password);

        $query = "SELECT * FROM customer WHERE User_name = '$username' AND Password = '$passwordenc'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);
            
            $_SESSION['customerid'] = $row['customer_ID'];
            $_SESSION['username'] = $row['User_name'];
            $_SESSION['userlevel'] = $row['User_level'];
            
            if ($_SESSION['userlevel'] == 'Admin') {
                header("Location: indexadmin.php");
            }

            if ($_SESSION['userlevel'] == 'Member') {
                header("Location: indexuser.php");
            }
        } else {
            header("location: login.php?message='User หรือ Password ไม่ถูกต้อง");
//            echo "<script>alert('User หรือ Password ไม่ถูกต้อง);</script>";
        }

    } else {
        header("Location: login.php");
    }


?>