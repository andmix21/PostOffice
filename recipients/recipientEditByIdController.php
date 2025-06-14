<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
edit_recipient_by_id($_POST['id'], $_POST['last_name'], $_POST['first_name'], $_POST['patronymic'], $_POST['phone']);
header('Location: recipientsPage.php');
?>