<?php
include "../functions_db.php";
$departments_info = get_all_departments_info();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../formPagesStyle.css">
    <title>Добавление сотрудника</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">ДОБАВЛЕНИЕ СОТРУДНИКА</div>
    </section>
    <div class="nav">
        <ul>
            <li><a href="#home">Начало страницы</a></li>
            <li><a href="../departments/departmentsPage.php">Почтовые отделения</a></li>
            <li><a href="../workers/workersPage.php">Сотрудники</a></li>
            <li><a href="../clients/clientsPage.php">Клиенты</a></li>
            <li><a href="../orders/ordersPage.php">Заказы</a></li>
            <li><a href="../tabPartOrders/statusOrderPage.php">Состояния заказов</a></li>
        </ul>
    </div>
    <section class = "formSection">
        <form action = "workerAddController.php" method = "POST" role = 'form'>
            <div class = form>
                <div class = label><label for = "last_name">Фамилия</label>
                    <div>
                        <input id = "last_name" type = "text" name = "last_name" required/>
                    </div>        
                </div>

                <div class = label><label for = "first_name">Имя</label>
                    <div>
                        <input id = "first_name" type = "text" name = "first_name" required/>
                    </div>        
                </div>

                <div class = label><label for = "patronymic">Отчество</label>
                    <div>
                        <input id = "patronymic" type = "text" name = "patronymic" required/>
                    </div>        
                </div>

                <div class = label><label for = "gender">Пол</label>
                    <div>
                        <input id = "gender" type = "text" name = "gender" required/>
                    </div>        
                </div>

                <div class = label><label for = "date_оf_birth">Дата рождения</label>
                    <div>
                        <input id = "date_оf_birth" type = "date" name = "date_оf_birth" required/>
                    </div>        
                </div>

                <div class = "label"><label for = "department_id">Место работы</label>
                    <div>
                        <select id = "department_id" name = "department_id">
                            <?php
                                for ($i = 0; $i < count($departments_info); $i++)
                                {
                                    $id = $departments_info[$i]["departmentID"];
                                    $department_region = $departments_info[$i]["departmentRegion"];
                                    $department_city_or_village = $departments_info[$i]["departmentCityOrVillage"];
                                    $department_address = $departments_info[$i]["departmentAddress"];

                                    $a = "";
                                    echo '<option '.$a.' value = "'.$id.'">'.$department_region.', '.$department_city_or_village.', '.$department_address.'</option>';
                                }
                            ?>
                        </select>
                    </div>        
                </div>

                <div class = label><label for = "worker_post">Должность</label>
                    <div>
                        <input id = "worker_post" type = "text" name = "worker_post" required/>
                    </div>        
                </div>

                <div class = button>
                    <button type = "submit" name = "add">Добавить</button>
                    <button type = "reset" name = "cancellation" onclick = "window.history.back()">Отмена</button>
                </div>
            </div>
        </form>
    </section>
</body>
</html>