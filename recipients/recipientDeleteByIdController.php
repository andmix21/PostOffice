<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
delete_recipient_by_id($_GET['recipientDelById']);
header("Location: recipientsPage.php");
?>