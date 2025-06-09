<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
delete_status_by_id($_GET['statusDelById']);
header("Location: statusPage.php");
?>