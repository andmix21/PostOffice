<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
$receipts_info = get_all_receipts_info();
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "receiptPageStyle.css">
    <title>Чеки на оплату</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">ЧЕКИ НА ОПЛАТУ</div>
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
    <section class = "add_and_find_receipt">
        <div class = searchdiv>
            <form action="searchResultReceiptPage.php" method="GET">
                <div><label for="search_term">Поиск чека по трек. коду</label></div>
                <div><input type="text" id="search_term" name="search_term" required>
                <button type="submit">Поиск</button></div>
            </form>
        </div>
    </section>
    <div class = "table">
        <table>
            <thead><th>Код</th><th colspan = 3>Сотрудник</th><th colspan = 3>Пункт отправления</th><th colspan = 4>Данные отправителя</th><th colspan = 3>Параметры корреспонденции</th><th colspan = 4>Данные получателя</th><th colspan = 3>Пункт назначения</th><th>Дата оформ.</th><th>Стоимость</th><th>Редактировать</th><th>Удалить</th></thead>
            <?php
                for($i = 0; $i < count($receipts_info); $i++)
                {
                    $receipt_id = $receipts_info[$i]["paymentReceiptID"];
                    $worker_last_name = $receipts_info[$i]["workerLastName"];
                    $worker_first_name = $receipts_info[$i]["workerFirstName"];
                    $worker_patronymic = $receipts_info[$i]["workerPatronymic"];
                    $a_dep_region = $receipts_info[$i]["A_depRegion"];
                    $a_dep_city_or_village = $receipts_info[$i]["A_depCityOrVillage"];
                    $a_dep_address = $receipts_info[$i]["A_depAddress"];
                    $client_last_name = $receipts_info[$i]["clientLastName"];
                    $client_first_name = $receipts_info[$i]["clientFirstName"];
                    $client_patronymic = $receipts_info[$i]["clientPatronymic"];
                    $client_phone = $receipts_info[$i]["clientPhone"];
                    $track_code = $receipts_info[$i]["correspID"];
                    $corresp_type_name = $receipts_info[$i]["typeName"];
                    $corresp_weight = $receipts_info[$i]["correspWeight"];
                    $recipient_last_name = $receipts_info[$i]["recipientLastName"];
                    $recipient_first_name = $receipts_info[$i]["recipientFirstName"];
                    $recipient_patronymic = $receipts_info[$i]["recipientPatronymic"];
                    $recipient_phone = $receipts_info[$i]["recipientPhone"];
                    $b_dep_region = $receipts_info[$i]["B_depRegion"];
                    $b_dep_city_or_village = $receipts_info[$i]["B_depCityOrVillage"];
                    $b_dep_address = $receipts_info[$i]["B_depAddress"];
                    $reg_date = $receipts_info[$i]["regDate"];
                    $cost = $receipts_info[$i]["cost"];
                    echo "<tr><td>$receipt_id</td>
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
                    <td>$track_code</td>
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