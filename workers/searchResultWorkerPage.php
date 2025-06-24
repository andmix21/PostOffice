<?php
include "../functions_db.php";
$searchTerm = $_GET['search_term'];
$workers_info = worker_search($searchTerm);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "workersPageStyle.css">
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
    <section class = "add_and_find_worker">
        <div class = "add_worker_button">
            <a href = "clientAddPage.php">Добавить нового сотрудника</a>
        </div>
    </section>
    <div class = "table">
        <table>
            <thead><th>Код</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Пол</th><th>Дата рождения</th><th colspan = 3>Место работы</th><th>Должность</th><th>Редактировать</th><th>Удалить</th></thead>
            <?php
                foreach ($workers_info as $worker)
                {
                    $worker_id = $worker["workerID"];
                    $worker_last_name = $worker["workerLastName"];
                    $worker_first_name = $worker["workerFirstName"];
                    $worker_patronymic = $worker["workerPatronymic"];
                    $worker_gender = $worker["gender"];
                    $worker_date_of_birth = $worker["dateOfBirth"];
                    $worker_department_region = $worker["departmentRegion"];
                    $worker_department_city = $worker["departmentCityOrVillage"];
                    $worker_department_address = $worker["departmentAddress"];
                    $worker_post = $worker["workerPost"];
                    echo "<tr><td>$worker_id</td>
                    <td>$worker_last_name</td>
                    <td>$worker_first_name</td>
                    <td>$worker_patronymic</td>
                    <td>$worker_gender</td>
                    <td>$worker_date_of_birth</td>
                    <td>$worker_department_region</td>
                    <td>$worker_department_city</td>
                    <td>$worker_department_address</td>
                    <td>$worker_post</td>
                    <td><a href = workerEditPage.php?workerEditById=$worker_id><img src = '/PostOffice/Resources/edit.png'</a></td>
                    <td><a href = workerDeleteByIdController.php?workerDelById=$worker_id><img src = '/PostOffice/Resources/cross.png'</a></td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>