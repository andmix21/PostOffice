<?php
include "../functions_db.php";
edit_corresp_type_by_id($_POST['id'], $_POST['type_name']);
header('Location: typeOfCorrespPage.php');
?>