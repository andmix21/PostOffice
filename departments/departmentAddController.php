<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
add_new_department($_POST['region'], $_POST['city_or_village'], $_POST['address']);
header("Location: departmentsPage.php");
?>