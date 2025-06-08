<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
delete_client_by_id($_GET['clientDelById']);
header("Location: clientsPage.php");
?>