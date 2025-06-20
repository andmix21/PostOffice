<?php
include "/PostOffice/functions_db.php";
$order_del_result = delete_order_by_id_proc($_GET['orderDelById']);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "orderDelResultPageStyle.css">
    <title>Результат удаления заказа</title>
</head>
<body class = del_result>
    <section class = "beginning", id='home'>
        <div class = "title_text">РЕЗУЛЬТАТ УДАЛЕНИЯ ЗАКАЗА</div>
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
<section class = "del_order_result_section">
        <div class = "del_order_result_div">
            <div class = del_res_massage><?php echo $order_del_result ?></div>
            <div class = back_button_div><div class = "back_button"><a href = "ordersPage.php">Вернуться обратно</a></div></div>
        </div>
</section>
</body>
</html>