<?php
include("../include/conn.php");
$id = $_REQUEST['id'];
if(empty($id))
{
    header("Location: ../index.php"); 
}
$update_status = mysqli_query($conn,"update leave_tbl set status=1 where id='$id'");
if($update_status)
{
	header('location:manage-leave.php');
}

?>