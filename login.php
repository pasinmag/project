<!DOCTYPE html>
<html>
<head>
	    <title>Login</title>
       
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="csstest.css">
        <meta charset = "utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
         <script src="bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.js"></script>
         <link rel="stylesheet" type="text/css" href="logincss.css">
         
</head>
<body>
    
	<div class="container">
		<h2>เข้าสู่ระบบ</h2>
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
		<form action="log.php" method="POST">
			<div class="form-group">
				<label for="ีusername">Username</label>
				<input type="text" class="form-control" id="username" placeholder="กรอกชื่อ" name="username" >
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" placeholder="กรอกรหัสผ่าน" name="password" >
			</div>
			<button type="submit" class="btn btn-primary bs">login</button>
		</form>
		<p class="text-decoration-underline text-center">หากคุณยังไม่สมัครเป็นสมาชิก</p>
		
		<a href="register.php" class="btn btn-primary d-flex justify-content-center h">Register</a>
		
        
		
	</div>


</body>
</html>