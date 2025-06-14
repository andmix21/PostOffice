<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
$status_info = get_all_status_info();
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "statusPageStyle.css">
    <title>Статусы</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">СТАТУСЫ</div>
    </section>
    <div class="nav">
        <ul>
            <li><a href="#home">Начало</a></li>
            <li><a href="/PostOffice/mainPage/mainPage.html">Главная</a></li>
            <li><a href="/PostOffice/clients/clientsPage.php">Клиенты</a></li>
            <li><a href="/PostOffice/recipients/recipientsPage.php">Получатели</a></li>
            <li><a href="/PostOffice/workers/workersPage.php">Сотрудники</a></li>
            <li><a href="/PostOffice/departments/departmentsPage.php">Почтовые отделения</a></li>
            <li><a href="#games">Заказы</a></li>
        </ul>
    </div>
    <section class = "add_and_find_status">
        <div class = searchdiv>
            <form action="searchResultStatusPage.php" method="GET">
                <div><label for="search_term">Поиск статуса</label></div>
                <div><input type="text" id="search_term" name="search_term" required>
                <button type="submit">Поиск</button></div>
            </form>
        </div>
        <div class = "add_status_button">
            <a href = "statusAddPage.php">Добавить новый статус</a>  
        </div>
    </section>
    <div class = "table">
        <table>
            <thead><th>Код</th><th>Название</th><th>Редактировать</th><th>Удалить</th></thead>
            <?php
                for($i = 0; $i < count($status_info); $i++)
                {
                    $status_id = $status_info[$i]["statusID"];
                    $status_name = $status_info[$i]["statusName"];
                    echo "<tr><td>$status_id</td>
                    <td>$status_name</td>
                    <td><a href = statusEditPage.php?statusEditById=$status_id><img src = '/PostOffice/Resources/edit.png'</a></td>
                    <td><a href = statusDeleteByIdController.php?statusDelById=$status_id><img src = '/PostOffice/Resources/cross.png'</a></td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>