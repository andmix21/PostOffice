<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
$departments_info = get_all_departments_info();
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "departmentsPageStyle.css">
    <title>Почтовые отделения</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">ПОЧТОВЫЕ ОТДЕЛЕНИЯ</div>
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
    <section class = "add_and_find_department">
        <div class = searchdiv>
            <form action="searchResultDepartmentPage.php" method="GET">
                <div><label for="search_term">Поиск отделения</label></div>
                <div><input type="text" id="search_term" name="search_term" required>
                <button type="submit">Поиск</button></div>
            </form>
        </div>
        <div class = "add_department_button">
            <a href = "departmentAddPage.php">Добавить новое отделение</a>  
        </div>
    </section>
    <div class = "table">
        <table>
            <thead><th>Код</th><th>Регион</th><th>Населенный пункт</th><th>Адрес</th><th>Редактировать</th><th>Удалить</th></thead>
            <?php
                for($i = 0; $i < count($departments_info); $i++)
                {
                    $department_id = $departments_info[$i]["departmentID"];
                    $department_region = $departments_info[$i]["departmentRegion"];
                    $department_city_or_village = $departments_info[$i]["departmentCityOrVillage"];
                    $department_address = $departments_info[$i]["departmentAddress"];
                    echo "<tr><td>$department_id</td>
                    <td>$department_region</td>
                    <td>$department_city_or_village</td>
                    <td>$department_address</td>
                    <td><a href = departmentEditPage.php?departmentEditById=$department_id><img src = '/PostOffice/Resources/edit.png'</a></td>
                    <td><a href = departmentDeleteByIdController.php?departmentDelById=$department_id><img src = '/PostOffice/Resources/cross.png'</a></td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>