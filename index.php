<?php
include "functions_db.php";
$clients_info = getAllInfo();
$client_info = getInfoByID(2);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "style.css">
    <title>Post office / clients</title>
</head>
<body>
    <section class = "beginning">
        <div class = "title_text">КЛИЕНТЫ ПОЧТОВЫХ ОТДЕЛЕНИЙ</div>
    </section>
    <div>
     <table>
         <thead><th>Код</th><th>ФИО</th><th>Паспорт</th><th>Телефон</th><th>Удалить</th></thead>
         <?php
         for($i = 0; $i < count($clients_info); $i++)
         {
             $id = $clients_info[$i]["clientID"];
             $fio = $clients_info[$i]["clientName"];
             $passport = $clients_info[$i]["clientPassport"];
             $phoneNumber = $clients_info[$i]["clientPhone"];
             echo "<tr><td>$id</td><td>$fio</td><td>$passport</td><td>$phoneNumber</td><td><a href = clientDelByIDController.php?clientDelByID=$id><img src = 'Resources/cross.png'</a></td></tr>";
         }
         ?>
     </table>
    </div>
    <div>
     <table>
         <thead><th>Код</th><th>ФИО</th><th>Паспорт</th><th>Телефон</th></thead>
         <?php
             $id = $client_info["clientID"];
             $fio = $client_info["clientName"];
             $passport = $client_info["clientPassport"];
             $phoneNumber = $client_info["clientPhone"];
             echo "<tr><td>$id</td><td>$fio</td><td>$passport</td><td>$phoneNumber</td></tr>";
         ?>
     </table>
    </div>
</body>
</html>