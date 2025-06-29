<?php
include "../functions_db.php";
$searchTerm = $_GET['search_term'];
$corresp_type_info = corresp_type_search($searchTerm);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "typeOfCorrespPageStyle.css">
    <title>Результаты поиска</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">РЕЗУЛЬТАТЫ ПОИСКА</div>
    </section>
    <div class="nav">
        <ul>
            <li><a href="#home">Начало страницы</a></li>
            <li><a href="../departments/departmentsPage.php">Почтовые отделения</a></li>
            <li><a href="../workers/workersPage.php">Сотрудники</a></li>
            <li><a href="../clients/clientsPage.php">Клиенты</a></li>
            <li><a href="../orders/ordersPage.php">Заказы</a></li>
            <li><a href="../tabPartOrders/statusOrderPage.php">Состояния заказов</a></li>
        </ul>
    </div>
    <section class = "add_and_find_corresp_type">
        <div class = "add_corresp_type_button">
            <a href = "typeOfCorrespAddPage.php">Добавить новый тип</a>
        </div>
    </section>
    <div class = "table">
        <table>
            <thead><th>Код</th><th>Название типа</th><th>Редактировать</th><th>Удалить</th></thead>
            <?php
                foreach($corresp_type_info as $corresp_type)
                {
                    $corresp_type_id = $corresp_type["correspTypeID"];
                    $corresp_type_name = $corresp_type["typeName"];
                    echo "<tr><td>$corresp_type_id</td>
                    <td>$corresp_type_name</td>
                    <td><a href = typeOfCorrespEditPage.php?typeOfCorrespEditById=$corresp_type_id><img src = '../Resources/edit.png'</a></td>
                    <td><a href = typeOfCorrespDeleteByIdController.php?typeOfCorrespDelById=$corresp_type_id><img src = '../Resources/cross.png'</a></td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>