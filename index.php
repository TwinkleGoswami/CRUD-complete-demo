<?php
include_once 'connection.php';
include_once 'login_link.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
</head>
<body>
<form class="login100-form validate-form flex-sb flex-w" id="login_form" name="login_form" method="post" action="" enctype="multipart/form-data">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
                <?php
                if(isset($_POST['login']))
                {
                    $emailid=$_POST['email'];
                    $password=$_POST['password'];
                    $sql="SELECT * FROM `tbl_register` WHERE email='$emailid' and password='$password'";
                    $res = mysqli_query($con,$sql);
                    $row=mysqli_fetch_array($res);
                    $record=mysqli_num_rows($res);
                    $id=$row[0];
                    $_SESSION['id']=$id;
                    $_SESSION['email']=$emailid;
                    if($record == 1)
                    {
                        if(!empty($_POST["remember-me"]))
                        {
                            setcookie ("email",$emailid,time()+ (86400 * 31));
                            setcookie ("password",$password,time()+ (86400 * 31));
                            $_SESSION['email']=$emailid;
                        }
                        else{
                            if(isset($_COOKIE["email"]))
                            {
                                setcookie ("email","");
                            }
                            if(isset($_COOKIE["password"]))
                            {
                                setcookie ("password","");
                            }
                        }
                        header('Location: userprofile.php');
                    }
                    else
                    {?>
                        <div class="alert alert-danger alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> Invalid Email Id and password!</strong>
                        </div>
                    <?php
                    }} ?>
						<span class="login100-form-title p-b-32">
                            <a href="register.php" class="txt3">Don't have an account?</a>
                        </span>
					<span class="login100-form-title p-b-32">Login</span>
					<span class="txt1 p-b-11">Email Id</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Email Id is required">
						<input class="input100" type="email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" name="email" id="email" >
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">Password</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass"><i class="fa fa-eye"></i></span>
						<input class="input100" type="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" name="password" id="password">
						<span class="focus-input100"></span>
					</div>
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox"  <?php if(isset($_COOKIE["email"])) { ?> checked <?php } ?>name="remember-me">
							<label class="label-checkbox100" for="ckb1">Remember me</label>
						</div>
						<div>
<!--							<a href="#" class="txt3">Forgot Password?</a>-->
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" id="login" name="login">Login</button>
					</div>
			</div>
		</div>
	</div>
</form>
	<div id="dropDownSelect1"></div>
<script src="Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="Login/vendor/animsition/js/animsition.min.js"></script>
<script src="Login/vendor/bootstrap/js/popper.js"></script>
<script src="Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="Login/vendor/select2/select2.min.js"></script>
<script src="Login/vendor/daterangepicker/moment.min.js"></script>
<script src="Login/vendor/daterangepicker/daterangepicker.js"></script>
<script src="Login/vendor/countdowntime/countdowntime.js"></script>
<script src="Login/js/main.js"></script>
</body>
</html>