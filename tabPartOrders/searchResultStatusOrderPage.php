<?php
include "/PostOffice/functions_db.php";
$searchTerm = $_GET['search_term'];
$status_order_info = status_order_search($searchTerm);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "statusOrdersPageStyle.css">
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
            <li><a href="/PostOffice/orders/ordersPage.php">Заказы</a></li>
            <li><a href="/PostOffice/tabPartOrders/statusOrderPage.php">Состояния заказов</a></li>
        </ul>
    </div>
    <section class = "indent_section">
    </section>
    <div class = "table">
        <table>
            <thead><th>Код заказа</th><th>Статус</th><th colspan = 3>Пункт фиксации</th><th>Дата фиксации</th><th>Редактировать</th><th>Удалить</th></thead>
            <?php
                foreach ($status_order_info as $status_order)
                {
                    $status_order_id = $status_order["tabPartOrderID"];
                    $order_id = $status_order["orderID"];
                    $status_name = $status_order["statusName"];
                    $department_region = $status_order["departmentRegion"];
                    $department_city_or_village = $status_order["departmentCityOrVillage"];
                    $department_address = $status_order["departmentAddress"];
                    $date_of_fix = $status_order["dateOfFix"];
                    echo "<tr>
                    <td>$order_id</td>
                    <td>$status_name</td>
                    <td>$department_region</td>
                    <td>$department_city_or_village</td>
                    <td>$department_address</td>
                    <td>$date_of_fix</td>
                    <td><a href = statusOrderEditPage.php?statusOrderEditById=$status_order_id><img src = '/PostOffice/Resources/edit.png'</a></td>
                    <td><a href = statusOrderDeleteByIdController.php?statusOrderDelById=$status_order_id><img src = '/PostOffice/Resources/cross.png'</a></td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>