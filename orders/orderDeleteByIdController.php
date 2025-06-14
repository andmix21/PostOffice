<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
delete_order_by_id($_GET['orderDelById']);
header("Location: ordersPage.php");
?>