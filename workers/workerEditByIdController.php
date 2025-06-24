<?php
include "../functions_db.php";
edit_worker_by_id($_POST['id'], $_POST['last_name'], $_POST['first_name'], $_POST['patronymic'], $_POST['gender'], $_POST['date_of_birth'], $_POST['department_id'], $_POST['worker_post']);
header('Location: workersPage.php');
?>