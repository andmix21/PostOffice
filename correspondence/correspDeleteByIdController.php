<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
delete_corresp_by_id($_GET['correspDelById']);
header("Location: correspPage.php");
?>