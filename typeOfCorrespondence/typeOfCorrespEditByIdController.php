<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";

edit_corresp_type_by_id($_POST['id'], $_POST['type_name']);

header('Location: typeOfCorrespPage.php');
?>