<?php
include "functions_db.php";
deleteInfoByID($_GET['clientDelByID']);
header("Location: index.php");
?>