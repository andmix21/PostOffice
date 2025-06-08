<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
add_new_recipient($_POST['last_name'], $_POST['first_name'], $_POST['patronymic'], $_POST['phone']);
header("Location: recipientsPage.php");
?>