<?php
include "/PostOffice/functions_db.php";
$recipients_info = get_all_recipient_info();
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "recipientsPageStyle.css">
    <title>Получатели</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">ПОЛУЧАТЕЛИ</div>
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
        <div class = searchdiv>
            <form action="searchResultRecipientPage.php" method="GET">
                <div><label for="search_term">Поиск получателя</label></div>
                <div><input type="text" id="search_term" name="search_term" required>
                <button type="submit">Поиск</button></div>
            </form>
        </div>
        <div class = "add_recipient_button">
            <a href = "recipientAddPage.php">Добавить нового получателя</a>  
        </div>
    </section>
    <div class = "table">
        <table>
            <thead><th>Код</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Телефон</th><th>Редактировать</th><th>Удалить</th></thead>
            <?php
                for($i = 0; $i < count($recipients_info); $i++)
                {
                    $recipient_id = $recipients_info[$i]["recipientID"];
                    $recipient_last_name = $recipients_info[$i]["recipientLastName"];
                    $recipient_first_name = $recipients_info[$i]["recipientFirstName"];
                    $recipient_patronymic = $recipients_info[$i]["recipientPatronymic"];
                    $recipient_phone_number = $recipients_info[$i]["recipientPhone"];
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