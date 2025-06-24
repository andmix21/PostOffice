<?php
include "/PostOffice/functions_db.php";
add_new_order($_POST['worker_id'], $_POST['sender_id'], $_POST['corresp_type_id'], $_POST['corresp_weight'], $_POST['recipient_id'], $_POST['department_id'], $_POST['cost'], $_POST['reg_date']);
header("Location: ordersPage.php");
?>