<?php
include "../functions_db.php";
edit_client_by_id($_POST['id'], $_POST['last_name'], $_POST['first_name'], $_POST['patronymic'], $_POST['passport'], $_POST['phone']);
header('Location: clientsPage.php');
?>