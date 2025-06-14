<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
edit_status_by_id($_POST['id'], $_POST['status_name']);
header('Location: statusPage.php');
?>