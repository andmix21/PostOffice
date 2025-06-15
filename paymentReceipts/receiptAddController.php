<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
add_new_receipt($_POST['order_id'], $_POST['cost']);
header("Location: /PostOffice/orders/ordersPage.php");
?>