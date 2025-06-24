<?php
include "../functions_db.php";
add_new_client($_POST['last_name'], $_POST['first_name'], $_POST['patronymic'], $_POST['passport'], $_POST['phone']);
header("Location: clientsPage.php");
?>