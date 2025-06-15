<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
$searchTerm = $_GET['search_term'];
$receipts_info = receipt_search($searchTerm);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "receiptPageStyle.css">
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
    <section class = "indent_section">
    </section>
    <div class = "table">
        <table>
            <thead><th>Код</th><th>Код заказа</th><th colspan = 3>Сотрудник</th><th colspan = 3>Пункт отправления</th><th colspan = 4>Данные отправителя</th><th colspan = 2>Параметры корреспонденции</th><th colspan = 4>Данные получателя</th><th colspan = 3>Пункт назначения</th><th>Дата оформ.</th><th>Стоимость</th><th>Редактировать</th><th>Удалить</th></thead>
            <?php
                foreach ($receipts_info as $receipt)
                {
                    $receipt_id = $receipt["paymentReceiptID"];
                    $order_id = $receipt["orderID"];
                    $worker_last_name = $receipt["workerLastName"];
                    $worker_first_name = $receipt["workerFirstName"];
                    $worker_patronymic = $receipt["workerPatronymic"];
                    $a_dep_region = $receipt["A_depRegion"];
                    $a_dep_city_or_village = $receipt["A_depCityOrVillage"];
                    $a_dep_address = $receipt["A_depAddress"];
                    $client_last_name = $receipt["clientLastName"];
                    $client_first_name = $receipt["clientFirstName"];
                    $client_patronymic = $receipt["clientPatronymic"];
                    $client_phone = $receipt["clientPhone"];
                    $corresp_type_name = $receipt["typeName"];
                    $corresp_weight = $receipt["correspWeight"];
                    $recipient_last_name = $receipt["recipientLastName"];
                    $recipient_first_name = $receipt["recipientFirstName"];
                    $recipient_patronymic = $receipt["recipientPatronymic"];
                    $recipient_phone = $receipt["recipientPhone"];
                    $b_dep_region = $receipt["B_depRegion"];
                    $b_dep_city_or_village = $receipt["B_depCityOrVillage"];
                    $b_dep_address = $receipt["B_depAddress"];
                    $reg_date = $receipt["regDate"];
                    $cost = $receipt["cost"];
                    echo "<tr><td>$receipt_id</td>
                    <td>$order_id</td>
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
                    <td>$reg_date</td>
                    <td>$cost</td>
                    <td><a href = receiptEditPage.php?receiptEditById=$receipt_id><img src = '/PostOffice/Resources/edit.png'</a></td>
                    <td><a href = receiptDeleteByIdController.php?receiptDelById=$receipt_id><img src = '/PostOffice/Resources/cross.png'</a></td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>