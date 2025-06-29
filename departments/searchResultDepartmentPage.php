<?php
include "../functions_db.php";
$searchTerm = $_GET['search_term'];
$departments_info = department_search($searchTerm);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "departmentsPageStyle.css">
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
    <section class = "add_and_find_department">
        <div class = "add_department_button">
            <a href = "departmentAddPage.php">Добавить новое отделение</a>
        </div>
    </section>
    <div class = "table">
        <table>
            <thead><th>Код</th><th>Регион</th><th>Населенный пункт</th><th>Адрес</th><th>Редактировать</th><th>Удалить</th></thead>
             <?php
                foreach ($departments_info as $department)
                {
                    $department_id = $department["departmentID"];
                    $department_region = $department["departmentRegion"];
                    $department_city_or_village = $department["departmentCityOrVillage"];
                    $department_address = $department["departmentAddress"];
                    echo "<tr>
                        <td>$department_id</td>
                        <td>$department_region</td>
                        <td>$department_city_or_village</td>
                        <td>$department_address</td>
                        <td><a href = departmentEditPage.php?departmentEditById=$department_id><img src = '../Resources/edit.png'</a></td>
                        <td><a href = departmentDeleteByIdController.php?departmentDelById=$department_id><img src = '../Resources/cross.png'</a></td>
                        </tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>