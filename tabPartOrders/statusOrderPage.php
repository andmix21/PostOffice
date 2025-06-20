<?php
include "/PostOffice/functions_db.php";
$status_orders_info = get_all_status_orders_info();
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "statusOrdersPageStyle.css">
    <title>Состояния заказов</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">СОСТОЯНИЯ ЗАКАЗОВ</div>
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
    <section class = "add_and_find_receipt">
        <div class = searchdiv>
            <form action="searchResultStatusOrderPage.php" method="GET">
                <div><label for="search_term">Поиск состояний заказа по коду</label></div>
                <div><input type="number" id="search_term" name="search_term" required>
                <button type="submit">Поиск</button></div>
            </form>
        </div>
    </section>
    <div class = "table">
        <table>
            <thead><th>Код заказа</th><th>Статус</th><th colspan = 3>Пункт фиксации</th><th>Дата фиксации</th><th>Редактировать</th><th>Удалить</th></thead>
            <?php
                for($i = 0; $i < count($status_orders_info); $i++)
                {
                    $status_order_id = $status_orders_info[$i]["tabPartOrderID"];
                    $order_id = $status_orders_info[$i]["orderID"];
                    $status_name = $status_orders_info[$i]["statusName"];
                    $department_region = $status_orders_info[$i]["departmentRegion"];
                    $department_city_or_village = $status_orders_info[$i]["departmentCityOrVillage"];
                    $department_address = $status_orders_info[$i]["departmentAddress"];
                    $date_of_fix = $status_orders_info[$i]["dateOfFix"];
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