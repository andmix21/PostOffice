<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
delete_status_order_by_id($_GET['statusOrderDelById']);
header("Location: statusOrderPage.php");
?>