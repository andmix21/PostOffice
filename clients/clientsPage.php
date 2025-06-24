<?php
include "/PostOffice/functions_db.php";
$clients_info = get_all_clients_info();
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "clientsPageStyle.css">
    <title>Клиенты</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">КЛИЕНТЫ</div>
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
    <section class = "add_and_find_client">
        <div class = searchdiv>
            <form action="searchResultClientPage.php" method="GET">
                <div><label for="search_term">Поиск клиента</label></div>
                <div><input type="text" id="search_term" name="search_term" required>
                <button type="submit">Поиск</button></div>
            </form>
        </div>
        <div class = "add_client_button">
            <a href = "clientAddPage.php">Добавить нового клиента</a>  
        </div>
    </section>
    <div class = "table">
        <table>
            <thead><th>Код</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Паспорт</th><th>Телефон</th><th>Редактировать</th><th>Удалить</th></thead>
            <?php
                for($i = 0; $i < count($clients_info); $i++)
                {
                    $client_id = $clients_info[$i]["clientID"];
                    $client_last_name = $clients_info[$i]["clientLastName"];
                    $client_first_name = $clients_info[$i]["clientFirstName"];
                    $client_patronymic = $clients_info[$i]["clientPatronymic"];
                    $client_passport = $clients_info[$i]["clientPassport"];
                    $client_phone_number = $clients_info[$i]["clientPhone"];
                    echo "<tr><td>$client_id</td>
                    <td>$client_last_name</td>
                    <td>$client_first_name</td>
                    <td>$client_patronymic</td>
                    <td>$client_passport</td>
                    <td>$client_phone_number</td>
                    <td><a href = clientEditPage.php?clientEditById=$client_id><img src = '/PostOffice/Resources/edit.png'</a></td>
                    <td><a href = clientDeleteByIdController.php?clientDelById=$client_id><img src = '/PostOffice/Resources/cross.png'</a></td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>