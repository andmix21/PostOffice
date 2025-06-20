<?php
include "/PostOffice/functions_db.php";
add_new_worker($_POST['last_name'], $_POST['first_name'], $_POST['patronymic'], $_POST['gender'], $_POST['date_оf_birth'], $_POST['department_id'], $_POST['worker_post']);
header("Location: workersPage.php");
?>