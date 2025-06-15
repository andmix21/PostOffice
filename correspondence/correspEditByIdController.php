<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
edit_corresp_by_id($_POST['id'], $_POST['corresp_type_id'], $_POST['corresp_weight']);
header('Location: correspPage.php');
?>