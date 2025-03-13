<?php
include "functions_db.php";
addNewClient($_POST['fio'], $_POST['passport'], $_POST['phone']);
header("Location: index.php");
?>