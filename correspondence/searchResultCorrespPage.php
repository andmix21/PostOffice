<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
$searchTerm = $_GET['search_term'];
$corresp_info = corresp_search($searchTerm);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "correspPageStyle.css">
    <title>Результаты поиска</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">РЕЗУЛЬТАТЫ ПОИСКА</div>
    </section>
    <div class="nav">
        <ul>
            <li><a href="#home">Начало</a></li>
            <li><a href="/PostOffice/mainPage/mainPage.html">Главная</a></li>
            <li><a href="/PostOffice/clients/clientsPage.php">Клиенты</a></li>
            <li><a href="/PostOffice/recipients/recipientsPage.php">Получатели</a></li>
            <li><a href="/PostOffice/workers/workersPage.php">Сотрудники</a></li>
            <li><a href="/PostOffice/departments/departmentsPage.php">Почтовые отделения</a></li>
            <li><a href="/PostOffice/orders/ordersPage.php">Заказы</a></li>
        </ul>
    </div>
    <section class = "add_and_find_corresp">
        <div class = "add_corresp_button">
            <a href = "departmentAddPage.php">Добавить корреспонденцию</a>
        </div>
    </section>
    <div class = "table">
        <table>
            <thead><th>Код</th><th>Тип</th><th>Вес</th><th>Редактировать</th><th>Удалить</th></thead>
             <?php
                foreach ($corresp_info as $corresp)
                {
                    $corresp_id = $corresp["ccorrespID"];
                    $corresp_type_id = $corresp["correspTypeID"];
                    $corresp_weight = $corresp["correspWeight"];
                    echo "<tr>
                        <td>$corresp_id</td>
                        <td>$corresp_type_id</td>
                        <td>$corresp_weight</td>
                        <td><a href = correspEditPage.php?correspEditById=$corresp_id><img src = '/PostOffice/Resources/edit.png'</a></td>
                        <td><a href = correspDeleteByIdController.php?correspDelById=$corresp_id><img src = '/PostOffice/Resources/cross.png'</a></td>
                        </tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>