<?php
include "functions_db.php";

edit_client_by_id($_POST['id'], $_POST['fio'], $_POST['passport'], $_POST['phone']);

header('Location: index.php');
?>