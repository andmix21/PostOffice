<?php
include "../functions_db.php";
add_new_status($_POST['status_name']);
header("Location: statusPage.php");
?>