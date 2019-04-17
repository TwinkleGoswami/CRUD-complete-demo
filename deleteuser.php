<?php
include_once 'connection.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE  FROM `tbl_register` WHERE id=$id";
    $res = mysqli_query($con, $sql);
}
?>