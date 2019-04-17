<?php
include_once 'connection.php';
include_once 'link.php';
session_start();
$id=$_SESSION['id'];
if (!isset($_SESSION['email']))
{
    header('location:index.php');
}

?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="assets/css/style.css" rel="stylesheet"/>
<div class="container">
    <div class="row">
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
        <br/><br/>
            <a href="logout.php"><span class="glyphicon">&#xe163;</span>Logout</a>
            <br>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <?php if (isset($_SESSION['firstname'])){?>
                        <h3 class="panel-title"><?php echo "Welcome ". $_SESSION['firstname']; ?></h3>
                    <?php } ?>
                </div>
                <div class="panel-body">
                    <?php
                    $sql="SELECT * FROM `tbl_register` WHERE id=$id";
                    $res=mysqli_query($con,$sql);
                    $row=mysqli_fetch_array($res);
                    ?>
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="images/<?php echo $row['profile'];?>" class="img-circle img-responsive imgborder"> </div>
                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>First Name:</td>
                                    <td class="text-capital"><?php echo $row[1];?></td>
                                </tr>
                                <tr>
                                    <td>Last Name:</td>
                                    <td class="text-capital"><?php echo $row[2];?></td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td><?php echo $row[3];?></td>
                                </tr>

                                <tr>
                                <tr>
                                    <td>Email Id</td>
                                    <td><?php echo $row[4];?></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><?php echo $row[5];?></td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td><?php echo $row[7];?></td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="edituser.php?id=<?php echo $id;?>" class="btn btn-success btn-lg">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                    </div>
                </div>
                <div class="panel-footer">
                </div>

            </div>
        </div>
    </div>
</div>