<?php
$id = $_REQUEST["id"];
$con = mysqli_connect("localhost","root","","test");
$query = "DELETE FROM users WHERE id = '$id'";
$result = mysqli_query($con, $query);

header("location:admin_login_page.php?message=Record deleted.");
?>