<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
edit_status_order_by_id($_POST['id'], $_POST['order_id'], $_POST['status_id'], $_POST['department_id'], $_POST['date_of_fix']);
header('Location: statusOrderPage.php');
?>