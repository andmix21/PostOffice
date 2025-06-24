<?php
include "../functions_db.php";
$orders_info = get_all_orders_info();
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "ordersPageStyle.css">
    <title>Заказы</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">ЗАКАЗЫ</div>
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
    <section class = "add_and_find_order">
        <div class = searchdiv>
            <form action="searchResultOrderPage.php" method="GET">
                <div><label for="search_term">Поиск заказа по коду</label></div>
                <div><input type="number" id="search_term" name="search_term" required>
                <button type="submit">Поиск</button></div>
            </form>
        </div>
        <div class = "add_order_button">
            <a href = "orderAddPage.php">Добавить новый заказ</a>  
        </div>
        <div class = "add_order_button">
            <a href = "/PostOffice/typeOfCorrespondence/typeOfCorrespPage.php">Список типов корреспонденций</a>  
        </div>
        <div class = "add_order_button">
            <a href = "/PostOffice/statusOfOrders/statusPage.php">Список статусов</a>  
        </div>
    </section>
    <div class = "table">
        <table>
            <thead><th>Код</th><th colspan = 3>Сотрудник</th><th colspan = 3>Пункт отправления</th><th colspan = 4>Данные отправителя</th><th colspan = 2>Параметры корреспонденции</th><th colspan = 4>Данные получателя</th><th colspan = 3>Пункт назначения</th><th>Стоимость</th><th>Дата оформ.</th><th>Состояние</th><th>Редактир.</th><th>Удалить</th></thead>
            <?php
                for($i = 0; $i < count($orders_info); $i++)
                {
                    $order_id = $orders_info[$i]["orderID"];
                    $worker_last_name = $orders_info[$i]["workerLastName"];
                    $worker_first_name = $orders_info[$i]["workerFirstName"];
                    $worker_patronymic = $orders_info[$i]["workerPatronymic"];
                    $a_dep_region = $orders_info[$i]["A_depRegion"];
                    $a_dep_city_or_village = $orders_info[$i]["A_depCityOrVillage"];
                    $a_dep_address = $orders_info[$i]["A_depAddress"];
                    $client_last_name = $orders_info[$i]["senderLastName"];
                    $client_first_name = $orders_info[$i]["senderFirstName"];
                    $client_patronymic = $orders_info[$i]["senderPatronymic"];
                    $client_phone = $orders_info[$i]["senderPhone"];
                    $corresp_type_name = $orders_info[$i]["typeName"];
                    $corresp_weight = $orders_info[$i]["correspWeight"];
                    $recipient_last_name = $orders_info[$i]["recipientLastName"];
                    $recipient_first_name = $orders_info[$i]["recipientFirstName"];
                    $recipient_patronymic = $orders_info[$i]["recipientPatronymic"];
                    $recipient_phone = $orders_info[$i]["recipientPhone"];
                    $b_dep_region = $orders_info[$i]["B_depRegion"];
                    $b_dep_city_or_village = $orders_info[$i]["B_depCityOrVillage"];
                    $b_dep_address = $orders_info[$i]["B_depAddress"];
                    $cost = $orders_info[$i]["cost"];
                    $reg_date = $orders_info[$i]["regDate"];
                    echo "<tr><td>$order_id</td>
                    <td>$worker_last_name</td>
                    <td>$worker_first_name</td>
                    <td>$worker_patronymic</td>
                    <td>$a_dep_region</td>
                    <td>$a_dep_city_or_village</td>
                    <td>$a_dep_address</td>
                    <td>$client_last_name</td>
                    <td>$client_first_name</td>
                    <td>$client_patronymic</td>
                    <td>$client_phone</td>
                    <td>$corresp_type_name</td>
                    <td>$corresp_weight</td>
                    <td>$recipient_last_name</td>
                    <td>$recipient_first_name</td>
                    <td>$recipient_patronymic</td>
                    <td>$recipient_phone</td>
                    <td>$b_dep_region</td>
                    <td>$b_dep_city_or_village</td>
                    <td>$b_dep_address</td>
                    <td>$cost</td>
                    <td>$reg_date</td>
                    <td><a href = /PostOffice/tabPartOrders/statusOrderAddPage.php?statusOrderAddById=$order_id><img src = '/PostOffice/Resources/addStatus.png'</a></td>
                    <td><a href = orderEditPage.php?orderEditById=$order_id><img src = '/PostOffice/Resources/edit.png'</a></td>
                    <td><a href = orderDeleteByIdController.php?orderDelById=$order_id><img src = '/PostOffice/Resources/cross.png'</a></td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>