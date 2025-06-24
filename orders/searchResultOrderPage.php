<?php
include "/PostOffice/functions_db.php";
$searchTerm = $_GET['search_term'];
$order_info = order_search($searchTerm);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "ordersPageStyle.css">
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
             <thead><th>Код</th><th colspan = 3>Сотрудник</th><th colspan = 3>Пункт отправления</th><th colspan = 4>Данные отправителя</th><th colspan = 2>Параметры корреспонденции</th><th colspan = 4>Данные получателя</th><th colspan = 3>Пункт назначения</th><th>Стоимость</th><th>Дата оформ.</th><th>Состояние</th><th>Редактир.</th><th>Удалить</th></thead>
            <?php
                foreach ($order_info as $order)
                {
                    $order_id = $order["orderID"];
                    $worker_last_name = $order["workerLastName"];
                    $worker_first_name = $order["workerFirstName"];
                    $worker_patronymic = $order["workerPatronymic"];
                    $a_dep_region = $order["A_depRegion"];
                    $a_dep_city_or_village = $order["A_depCityOrVillage"];
                    $a_dep_address = $order["A_depAddress"];
                    $client_last_name = $order["senderLastName"];
                    $client_first_name = $order["senderFirstName"];
                    $client_patronymic = $order["senderPatronymic"];
                    $client_phone = $order["senderPhone"];
                    $corresp_type_name = $order["typeName"];
                    $corresp_weight = $order["correspWeight"];
                    $recipient_last_name = $order["recipientLastName"];
                    $recipient_first_name = $order["recipientFirstName"];
                    $recipient_patronymic = $order["recipientPatronymic"];
                    $recipient_phone = $order["recipientPhone"];
                    $b_dep_region = $order["B_depRegion"];
                    $b_dep_city_or_village = $order["B_depCityOrVillage"];
                    $b_dep_address = $order["B_depAddress"];
                    $cost = $order["cost"];
                    $reg_date = $order["regDate"];
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