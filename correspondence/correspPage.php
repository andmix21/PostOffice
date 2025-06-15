<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
$corresp_info = get_all_corresp_info();
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "correspPageStyle.css">
    <title>Корреспонденции</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">КОРРЕСПОНДЕНЦИИ</div>
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
        <div class = searchdiv>
            <form action="searchResultCorrespPage.php" method="GET">
                <div><label for="search_term">Поиск корреспонденции</label></div>
                <div><input type="text" id="search_term" name="search_term" required>
                <button type="submit">Поиск</button></div>
            </form>
        </div>
        <div class = "add_corresp_button">
            <a href = "correspAddPage.php">Добавить корреспонденцию</a>  
        </div>
        <div class = "add_corresp_button">
            <a href = "/PostOffice/typeOfCorrespondence/typeOfCorrespPage.php">Типы корреспонденций</a>  
        </div>
    </section>
    <div class = "table">
        <table>
            <thead><th>Код</th><th>Тип</th><th>Вес</th><th>Редактировать</th><th>Удалить</th></thead>
            <?php
                for($i = 0; $i < count($corresp_info); $i++)
                {
                    $corresp_id = $corresp_info[$i]["correspID"];
                    $corresp_type_id = $corresp_info[$i]["typeName"];
                    $corresp_weight = $corresp_info[$i]["correspWeight"];
                    echo "<tr><td>$corresp_id</td>
                    <td>$corresp_type_id</td>
                    <td>$corresp_weight</td>
                    <td><a href = correspEditPage.php?correspEditById=$corresp_id><img src = '/PostOffice/Resources/edit.png'</a></td>
                    <td><a href = correspDeleteByIdController.php?correspDelById=$corresp_id><img src = '/PostOffice/Resources/cross.png'</a></td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>