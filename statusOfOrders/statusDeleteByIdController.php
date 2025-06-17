<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
$status_del_result = delete_status_by_id_proc($_GET['statusDelById']);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "statusPageStyle.css">
    <title>Результат удаления статуса</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">РЕЗУЛЬТАТ УДАЛЕНИЯ СТАТУСА</div>
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
<section class = "del_status_result_section">
        <div class = "del_status_result_div">
            <div class = del_res_massage><?php echo $status_del_result ?></div>
            <div class = back_button_div><div class = "add_status_button"><a href = "statusPage.php">Вернуться обратно</a></div></div>
        </div>
</section>
</body>
</html>