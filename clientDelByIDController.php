<?php
include "functions_db.php";
deleteInfoByID($_GET['clientID']);
header("Location: index.php");
?>