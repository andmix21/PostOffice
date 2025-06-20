<?php
include "/PostOffice/functions_db.php";
$departments_info = get_all_departments_info();
$workers_info = get_all_workers_info();
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "workersPageStyle.css">
    <title>Сотрудники</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">СОТРУДНИКИ</div>
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
    <section class = "add_and_find_worker">
        <div class = searchdiv>
            <form action="searchResultWorkerPage.php" method="GET">
                <div><label for="search_term">Поиск сотрудника</label></div>
                <div><input type="text" id="search_term" name="search_term" required>
                <button type="submit">Поиск</button></div>
            </form>
        </div>
        <div class = "add_worker_button">
            <a href = "workerAddPage.php">Добавить нового сотрудника</a>  
        </div>
    </section>
    <div class = "table">
        <table>
            <thead><th>Код</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Пол</th><th>Дата рождения</th><th colspan = 3>Место работы</th><th>Должность</th><th>Редактировать</th><th>Удалить</th></thead>
            <?php
                for($i = 0; $i < count($workers_info); $i++)
                {
                    $worker_id = $workers_info[$i]["workerID"];
                    $worker_last_name = $workers_info[$i]["workerLastName"];
                    $worker_first_name = $workers_info[$i]["workerFirstName"];
                    $worker_patronymic = $workers_info[$i]["workerPatronymic"];
                    $worker_gender = $workers_info[$i]["gender"];
                    $worker_date_of_birth = $workers_info[$i]["dateOfBirth"];
                    $worker_department_region = $workers_info[$i]["departmentRegion"];
                    $worker_department_city = $workers_info[$i]["departmentCityOrVillage"];
                    $worker_department_address = $workers_info[$i]["departmentAddress"];
                    $worker_post = $workers_info[$i]["workerPost"];
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