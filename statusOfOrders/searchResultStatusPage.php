<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
$searchTerm = $_GET['search_term'];
$status_info = status_search($searchTerm);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "statusPageStyle.css">
    <title>Результаты поиска</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">РЕЗУЛЬТАТЫ ПОИСКА</div>
    </section>
    <div class="nav">
        <ul>
            <li><a href="#home">Начало страницы</a></li>
            <li><a href="/PostOffice/departments/departmentsPage.php">Почтовые отделения</a></li>
            <li><a href="/PostOffice/workers/workersPage.php">Сотрудники</a></li>
            <li><a href="/PostOffice/clients/clientsPage.php">Клиенты</a></li>
            <li><a href="/PostOffice/recipients/recipientsPage.php">Получатели</a></li>
            <li><a href="/PostOffice/orders/ordersPage.php">Заказы</a></li>
            <li><a href="/PostOffice/tabPartOrders/statusOrderPage.php">Состояния заказов</a></li>
        </ul>
    </div>
    <section class = "add_and_find_status">
        <div class = "add_status_button">
            <a href = "statusAddPage.php">Добавить новый статус</a>
        </div>
    </section>
    <div class = "table">
        <table>
            <thead><th>Код</th><th>Название</th><th>Редактировать</th><th>Удалить</th></thead>
            <?php
                foreach($status_info as $status)
                {
                    $status_id = $status["statusID"];
                    $status_name = $status["statusName"];
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