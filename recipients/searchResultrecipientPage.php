<?php
include "/PostOffice/functions_db.php";
$searchTerm = $_GET['search_term'];
$recipients_info = recipient_search($searchTerm);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "recipientsPageStyle.css">
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
            <li><a href="/PostOffice/recipients/recipientsPage.php">Получатели</a></li>
            <li><a href="/PostOffice/orders/ordersPage.php">Заказы</a></li>
            <li><a href="/PostOffice/tabPartOrders/statusOrderPage.php">Состояния заказов</a></li>
        </ul>
    </div>
    <section class = "add_and_find_recipient">
        <div class = "add_recipient_button">
            <a href = "recipientAddPage.php">Добавить нового получателя</a>
        </div>
    </section>
    <div class = "table">
        <table>
            <thead><th>Код</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Телефон</th><th>Редактировать</th><th>Удалить</th></thead>
            <?php
                foreach($recipients_info as $recipient)
                {
                    $recipient_id = $recipient["recipientID"];
                    $recipient_last_name = $recipient["recipientLastName"];
                    $recipient_first_name = $recipient["recipientFirstName"];
                    $recipient_patronymic = $recipient["recipientPatronymic"];
                    $recipient_phone_number = $recipient["recipientPhone"];
                    echo "<tr><td>$recipient_id</td>
                    <td>$recipient_last_name</td>
                    <td>$recipient_first_name</td>
                    <td>$recipient_patronymic</td>
                    <td>$recipient_phone_number</td>
                    <td><a href = recipientEditPage.php?recipientEditById=$recipient_id><img src = '/PostOffice/Resources/edit.png'</a></td>
                    <td><a href = recipientDeleteByIdController.php?recipientDelById=$recipient_id><img src = '/PostOffice/Resources/cross.png'</a></td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>