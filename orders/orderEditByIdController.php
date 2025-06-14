<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
edit_order_by_id($_POST['id'], $_POST['worker_id'], $_POST['client_id'], $_POST['track_code'], $_POST['corresp_type_id'], $_POST['corresp_weight'], , $_POST['reciient_id'], $_POST['department_id'], $_POST['reg_date']);
header('Location: ordersPage.php');
?>