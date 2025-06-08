<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
delete_corresp_type_by_id($_GET['typeOfCorrespDelById']);
header("Location: typeOfCorrespPage.php");
?>