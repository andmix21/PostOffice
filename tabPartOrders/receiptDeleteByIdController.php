<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
delete_receipt_by_id($_GET['receiptDelById']);
header("Location: receiptPage.php");
?>