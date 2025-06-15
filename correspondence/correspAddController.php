<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
add_new_corresp($_POST['corresp_type_id'], $_POST['corresp_weight']);
header("Location: correspPage.php");
?>