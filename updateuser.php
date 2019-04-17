
<?php
include_once 'connection.php';
if (isset($_POST['user_id'])) {
    $id = $_POST['user_id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $new_date = date("Y-m-d", strtotime($dob));
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $city = $_POST['city'];
    $sql = "UPDATE `tbl_register` SET `firstname`= '$fname',`lastname`='$lname',`dob`='$new_date',`email`='$email',`password`='$password',`confirmpassword`='$confirmpassword',`city` = '$city' WHERE id=$id";
    echo $sql;
    mysqli_query($con, $sql);
}
?>