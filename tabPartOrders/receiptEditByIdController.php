<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
edit_receipt_by_id($_POST['id'], $_POST['order_id'], $_POST['cost']);
header('Location: receiptPage.php');
?>