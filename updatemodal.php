
<?php
include_once 'connection.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM `tbl_register` WHERE id = $id";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($res);
    echo json_encode($row);
}
?>