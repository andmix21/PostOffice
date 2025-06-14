<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
delete_worker_by_id($_GET['workerDelById']);
header("Location: workersPage.php");
?>