<?php
include_once 'connection.php';
include_once 'link.php';
session_start();
$id=$_SESSION['id'];
if (!isset($_SESSION['email']))
{
    header('location:index.php');
}
if (isset($_POST['upload']))
{
    $file_name = $_FILES['profile']['name'];
    $file_tmp = $_FILES['profile']['tmp_name'];
    $file_type = $_FILES['profile']['type'];
    move_uploaded_file($file_tmp, "images/" . $file_name);
    $sql="UPDATE `tbl_register` SET `profile`='$file_name' WHERE id=$id";
    mysqli_query($con,$sql);
}

?>
<html>
<head><title></title>
    <link href="assets/css/style.css" type="text/css" rel="stylesheet">
    <script src="assets/js/jquery.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<form id="edituser_form" name="edituser_form" method="post" action="" enctype="multipart/form-data">
    <div class="container" style="margin-top:30px">
        <div class="col-md-10 col-md-offset-1">
            <?php
            $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
            echo "<a href='$url'><i class=\"fa fa-arrow-circle-left\" style=\"font-size:24px\"></i></a>";
            if(isset($_POST["update"]))
            {
                $firstname = $_POST['first_name'];
                $lastname = $_POST['last_name'];
                $dob = $_POST['datepicker'];
                $new_date = date("Y-m-d", strtotime($dob));
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirmpassword = $_POST['password_confirmation'];
                $city = $_POST['city'];
                $sql="UPDATE `tbl_register` SET `firstname`= '$firstname',`lastname`='$lastname',`dob`='$new_date',`email`='$email',`password`='$password',`confirmpassword`='$confirmpassword',`city` = '$city' WHERE id=$id";
                $res = mysqli_query($con, $sql);
                if($res) {?>
                    <div class="alert alert-success alert-dismissible fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Successfully Updated!</strong>
                    </div>
                <?php }}?>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><strong>Edit User Profile </strong></h3>

                </div>
                <div class="panel-body">
                    <form role="form">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $id= $_GET['id'];
                            $sql="SELECT * FROM `tbl_register` where id=$id";
                            $res = mysqli_query($con, $sql);
                            $row=mysqli_fetch_array($res);
                        } ?>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <img alt="User Pic" width="250" src="images/<?php echo $row['profile'];?>"style="align-items: center" class="img-circle img-responsive imgborder">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <button type="submit" id="upload" name="upload" class="btn btn-primary">Upload</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" name="first_name" value="<?php echo $row[1]?>" id="first_name" class="form-control" placeholder="First Name" tabindex="1">
                                    </div>
                                    <span id="first_name_error"></span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" name="last_name" value="<?php echo $row[2]?>" id="last_name" class="form-control " placeholder="Last Name" tabindex="2">
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
                                    <input type="text" name="datepicker" readonly value="<?php echo $row[3]?>" id="datepicker"  placeholder="Enter DOB" class="form-control " tabindex="3">
                                    </div>
                                    <span id="datepicker_error"></span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="email" name="email" value="<?php echo $row[4]?>" id="email" class="form-control " placeholder="Email Address" tabindex="4">
                                    </div>
                                    <span id="email_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-eye-open"></i></span>
                                    <input type="text" name="password" value="<?php echo $row[5]?>" id="password" class="form-control " placeholder="Password" tabindex="5">
                                    </div>
                                    <span id="password_error"></span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-eye-open"></i></span>
                                    <input type="text" name="password_confirmation" value="<?php echo $row[6]?>" id="password_confirmation" class="form-control " placeholder="Confirm Password" tabindex="6">
                                    </div>
                                    <span id="cpassword_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <select name="city" id="city" class="form-control" tabindex="7">
                                        <option <?php if($row[7] == "Surat"){ echo 'selected="selected"'; } ?> value="Surat">Surat</option>
                                        <option <?php if($row[7] == "Ahemedabad"){ echo 'selected="selected"'; } ?> value="Ahemedabad">Ahemedabad</option>
                                        <option <?php if($row[7] == "Vadodra"){ echo 'selected="selected"'; } ?> value="Vadodra">Vadodra</option>
                                        <option <?php if($row[7] == "Navsari"){ echo 'selected="selected"'; } ?> value="Navsari">Navsari</option>
                                        <option <?php if($row[7] == "Bharuch"){ echo 'selected="selected"'; } ?> value="Bharuch">Bharuch</option>
                                        <option <?php if($row[7] == "Vapi"){ echo 'selected="selected"'; } ?> value="Vapi">Vapi</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group" >
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                    <input type="file" name="profile" value="images/<?php echo $row['profile']?>" id="profile" tabindex="8" accept=".jpg, .jpeg, .png">
                                    </div>
                                    <span id="profile_error"></span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="update" name="update" class="btn btn-success" style="display: block; margin-left: auto;margin-right: auto;width: 20%;">Update</button>
                        <hr style="margin-top:10px;margin-bottom:10px;">
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>