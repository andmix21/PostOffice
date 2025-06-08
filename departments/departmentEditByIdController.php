<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";

edit_department_by_id($_POST['id'], $_POST['region'], $_POST['city_or_village'], $_POST['address']);

header('Location: departmentsPage.php');
?>