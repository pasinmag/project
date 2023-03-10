<!DOCTYPE html>
<html>
<head>
	    
	    <title>Register</title>
       
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="csstest.css">
        <meta charset = "utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
         <script src="bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.js"></script>
         <link rel="stylesheet" type="text/css" href="regiscss.css">
         
</head>
<body>
    
	<div class="container">
		<h2>สมัครสมาชิก</h2>
		<?php if(isset($_GET['message']) && $_GET['message']): ?>
            <div class="alert alert-danger">
                <?php echo $_GET['message']; ?>
            </div>
        <?php endif; ?>
        <?php if(isset($_GET['success']) && $_GET['success']): ?>
            <div class="alert alert-success">
                <?php echo $_GET['success']; ?>
            </div>
        <?php endif; ?>
		<form action="reg.php" method="POST">
		    <div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" id="username" placeholder="กรอกยูสเซอร์เนม" name="username" >
			</div>
			<div class="form-group">
				<label for="firstname">Firstname</label>
				<input type="text" class="form-control" id="firstname" placeholder="กรอกชื่อ" name="firstname" >
			</div>
			<div class="form-group">
				<label for="lastname">Lastname</label>
				<input type="text" class="form-control" id="lastname" placeholder="กรอกนามสกุล" name="lastname" >
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" placeholder="กรอกรหัสผ่าน" name="password" >
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" placeholder="กรอกอีเมล" name="email" >
			</div>
			<div class="form-group">
				<label for="phonenumber">Phone-number</label>
				<input type="phonenumber" class="form-control" id="phonenumber" placeholder="กรอกเบอร์โทรศัพท์" name="phonenumber" >
			</div>
			<button type="submit" class="btn btn-primary bs">submit</button>
		</form>
                <p class="text-decoration-underline text-center">หากคุณสมาชิกเเล้ว</p>
		    
		        <a href="login.php" class="btn btn-primary d-flex justify-content-center h">Login</a>
		    
		

		
	</div>


</body>
</html>
