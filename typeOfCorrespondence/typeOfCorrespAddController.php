<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
add_new_corresp_type($_POST['corresp_type']);
header("Location: typeOfCorrespPage.php");
?>