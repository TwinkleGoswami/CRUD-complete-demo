<?php
include_once 'connection.php';
include_once 'link.php';
session_start();
$id=$_SESSION['id'];
if (!isset($_SESSION['email']))
{
    header('location:admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link href="assets/css/style.css" type="text/css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style type="text/css">
    body
    {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
    }
    </style>
</head>
<body>
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>Users</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="admin.php" class="btn btn-info" ><i class="material-icons">&#xE15C;</i> <span>Logout</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>User Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Email Id</th>
                <th>Password</th>
                <th>City</th>
                <th>Profile</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $result_perpage=5;
            $sql="SELECT * FROM `tbl_register`";
            $res=mysqli_query($con,$sql);
            $result=mysqli_num_rows($res);
            $no_page=ceil($result/$result_perpage);
            if(!isset($_GET['page']))
            {
                $page=1;
            }
            else{
                $page=$_GET['page'];
            }
            $this_page=($page-1)*$result_perpage;
            $sql="SELECT * FROM `tbl_register` LIMIT ".$this_page.','.$result_perpage;
            $res=mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($res)){
                ?>
                <tr>
                    <td><?php echo $row[0];?></td>
                    <td><?php echo $row[1];?></td>
                    <td><?php echo $row[2];?></td>
                    <td><?php echo $row[3];?></td>
                    <td><?php echo $row[4];?></td>
                    <td><?php echo $row[5];?></td>
                    <td><?php echo $row[7];?></td>
                    <td><img src="images/<?php echo $row[8];?>" width="100"/></td>
                    <td>
                        <a href="#editEmployeeModal" onclick="editmember('<?php echo $row[0];?>')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xe3c9;</i></a>
                        <a href="#deleteEmployeeModal" data-id="<?php echo $row[0]; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                </tr>
            <?php }?>
            <tr>
                <td colspan="9">
                <div class="clearfix">
                <ul class="pagination">
                    <?php for($page=1;$page<=$no_page;$page++)
                    {?>
                    <li><a href="userdetails.php?page=<?php echo $page;?>" class="page-link"><?php echo $page;?></a></li>
                    <?php }?>
                </ul>
                </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<form id="edituser_form" name="edituser_form" method="post" action="" enctype="multipart/form-data">
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Edit Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
                                <img alt="User Pic" id="logo" name="logo" class="img-circle img-responsive">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <button type="button" id="upload" name="upload" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="hidden" id="userid" name="userid" class="form-control" >
                                <input type="text" id="firstname" name="firstname" class="form-control" >
                                <span id="first_name_error"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" id="lastname" name="lastname" class="form-control" >
                                <span id="last_name_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" id="dob" value="<?php echo date('d/m/Y',strtotime($row['dob'])) ?>" name="dob" class="form-control" >
                                <span id="datepicker_error"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Email Id</label>
                                <input type="email" id="email" name="email" class="form-control" >
                                <span id="email_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" id="password" name="password" class="form-control" >
                                <span id="password_error"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" >
                                <span id="cpassword_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>City</label>
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
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Profile</label>
                                <input type="file" name="profile" id="profile" tabindex="8" accept=".jpg, .jpeg, .png">
                                <span id="profile_error"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="button" id="updateuserval" class="btn btn-info" name="updateuserval" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
</form>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                    <input type="hidden" id="DeleteID" />
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="button" id="delete" name="delete" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="assets/js/jquery.js"></script>
</body>
</html>