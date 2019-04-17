<?php
include_once 'connection.php';
include_once 'link.php';
?>
<html>
<head><title></title>
    <link href="assets/css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
<form id="registration_form" name="registration_form" method="post" action="" enctype="multipart/form-data">
<div class="container" style="margin-top:30px">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><strong>Sign up </strong></h3>
            </div>
            <div class="panel-body">
            <form role="form">
            <?php
            if(isset($_POST['register'])) {
                $firstname = $_POST['first_name'];
                $lastname = $_POST['last_name'];
                $dob = $_POST['datepicker'];
                $your_date = date("Y-m-d", strtotime($dob));
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirmpassword = $_POST['password_confirmation'];
                $city = $_POST['city'];
                $file_name = $_FILES['profile']['name'];
                $file_tmp = $_FILES['profile']['tmp_name'];
                $file_type = $_FILES['profile']['type'];
                move_uploaded_file($file_tmp, "images/" . $file_name);
                $sql = "INSERT INTO `tbl_register`(`firstname`, `lastname`, `dob`, `email`, `password`, `confirmpassword`, `city`, `profile`) VALUES ('$firstname','$lastname','$your_date','$email','$password','$confirmpassword','$city','$file_name')";
                $res = mysqli_query($con, $sql);
                if($res) {
                    header("Refresh: 5; url= index.php");?>
                <div class="alert alert-success alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Successfully Registration!</strong>
                </div>
                <?php }else
                    {?>
                        <div class="alert alert-danger alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Records not registered successfully !</strong>
                </div>
                   <?php  }
            } ?>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" tabindex="1">
                            </div>
                            <span id="first_name_error"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" name="last_name" id="last_name" class="form-control " placeholder="Last Name" tabindex="2">
                            </div>
                            <span id="last_name_error"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            <input type="text" name="datepicker" readonly id="datepicker"  placeholder="Enter DOB" class="form-control " tabindex="3">
                            </div>
                            <span id="datepicker_error"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input type="email" name="email" id="email" class="form-control " placeholder="Email Address" tabindex="4">
                            </div>
                            <span id="email_error"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-eye-close"></i></span>
                            <input type="password" name="password" id="password" class="form-control " placeholder="Password" tabindex="5">
                            </div>
                            <span id="password_error"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="custom-file">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                            <input type="file" name="profile" class="custom-file-input" id="profile" tabindex="8">
                            </div>
                            <span id="profile_error"></span>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-eye-close"></i></span>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control " placeholder="Confirm Password" tabindex="6">
                            </div>
                            <span id="cpassword_error"></span>
                        </div>
                    </div>
                    <?php
                    $size=8;
                    $alpha_key1 = '';
                    $alpha_key2 = '';
                    $no_key = '';
                    $keys = range('A', 'Z');
                    $keys1 = range(0, 9);

                    for ($i = 0; $i < 2; $i++) {
                        $alpha_key1 .= $keys[array_rand($keys)];
                    }

                    for ($i = 2; $i < 4; $i++) {
                        $no_key .= $keys1[array_rand($keys1)];
                    }
                    for ($i = 4; $i < 6; $i++) {
                        $alpha_key2 .= $keys[array_rand($keys)];
                    }
                    $length = $size - 6;
                    $key = '';
                    $keys = range(0, 8);
                    for ($i = 0; $i < $length; $i++) {
                        $key .= $keys[array_rand($keys)];
                    }
                    ?>
                    <div class="col-xs-12 col-sm-3 col-md-3" >
                            <div class="form-group">
                                <div class="captcha-img" id="random">
                                    <span class="rotate_char1"><?php echo $alpha_key1; ?></span>
                                    <span class="rotate_char2"><?php echo $no_key; ?></span>
                                    <span class="rotate_char3"><?php echo $alpha_key2 ?></span>
                                    <span class="rotate_char4"><?php echo $key; ?></span>
                                </div>
                                <div id="ran" style="display: none"><?php echo $captcha=$alpha_key1.$no_key.$alpha_key2.$key ?></div>
                            </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group" >
                            <button type="button" name="refresh" id="refresh" class="btn btn-default btn-sm" onclick="mycaptcha();" >
                                <span class="glyphicon glyphicon-refresh"></span> Refresh
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <select name="city" id="city" class="form-control" tabindex="7">
                                <option value="Surat">Surat</option>
                                <option value="Ahemedabad">Ahemedabad</option>
                                <option value="Vadodra">Vadodra</option>
                                <option value="Navsari">Navsari</option>
                                <option value="Bharuch">Bharuch</option>
                                <option value="Vapi">Vapi</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-sort-by-alphabet"></i></span>
                                <input type="text" name="captcha" id="captcha" class="form-control " placeholder="Enter captcha code" tabindex="8">
                                    </div>
                                <span id="captcha_error"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" id="register" name="register" class="btn btn-success">Sign Up</button>
                <hr style="margin-top:10px;margin-bottom:10px;">
            </form>
            </div>
        </div>
    </div>
</div>
</form>
<script src="assets/js/jquery.js" type="text/javascript"></script>
</body>
</html>