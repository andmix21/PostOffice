<?php
include "functions_db.php";
deleteClientByID($_GET['clientDelByID']);
header("Location: index.php");
?>