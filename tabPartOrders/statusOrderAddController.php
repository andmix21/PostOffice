<?php
include "/PostOffice/functions_db.php";
add_new_status_order($_POST['order_id'], $_POST['status_id'], $_POST['department_id'], $_POST['date_of_fix']);
header("Location: /PostOffice/orders/ordersPage.php");
?>