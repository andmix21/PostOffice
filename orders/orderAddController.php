<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
add_new_order($_POST['worker_id'], $_POST['client_id'], $_POST['corresp_id'], $_POST['reciient_id'], $_POST['department_id'], $_POST['reg_date']);
header("Location: ordersPage.php");
?>