<?php
if (isset($_GET['fd']))
{
    echo "hii";
    $id=$_POST['user_id'];
    $file_name = $_FILES['profile']['name'];
    $file_tmp = $_FILES['profile']['tmp_name'];
    $file_type = $_FILES['profile']['type'];
    move_uploaded_file($file_tmp, "images/".$file_name);
    $sql="UPDATE `tbl_register` SET `profile`='$file_name' WHERE id=$id";
    echo $sql;
    //mysqli_query($con,$sql);
}
?>