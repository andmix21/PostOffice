<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
delete_department_by_id($_GET['departmentDelById']);
header("Location: departmentsPage.php");
?>