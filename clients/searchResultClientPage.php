<?php
include "/PostOffice/functions_db.php";
$searchTerm = $_GET['search_term'];
$clients_info = client_search($searchTerm);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "clientsPageStyle.css">
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
    <section class = "add_and_find_client">
        <div class = "add_client_button">
            <a href = "clientAddPage.php">Добавить нового клиента</a>
        </div>
    </section>
    <div class = "table">
        <table>
            <thead><th>Код</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Паспорт</th><th>Телефон</th><th>Редактировать</th><th>Удалить</th></thead>
            <?php
                foreach ($clients_info as $client)
                {
                    $client_id = $client["clientID"];
                    $client_last_name = $client["clientLastName"];
                    $client_first_name = $client["clientFirstName"];
                    $client_patronymic = $client["clientPatronymic"];
                    $client_passport = $client["clientPassport"];
                    $client_phone_number = $client["clientPhone"];
                    echo "<tr>
                        <td>$client_id</td>
                        <td>$client_last_name</td>
                        <td>$client_first_name</td>
                        <td>$client_patronymic</td>
                        <td>$client_passport</td>
                        <td>$client_phone_number</td>
                        <td><a href='clientEditPage.php?clientEditById=$client_id'><img src='/PostOffice/Resources/edit.png'></a></td>
                        <td><a href='clientDeleteByIdController.php?clientDelById=$client_id'><img src='/PostOffice/Resources/cross.png'></a></td>
                        </tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>