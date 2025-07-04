<?php
include "../functions_db.php";
$workers_info = get_all_workers_info();
$clients_info = get_all_clients_info();
$corresp_type_info = get_all_corresp_type_info();
$departments_info = get_all_departments_info();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../formPagesStyle.css">
    <title>Оформление заказа</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">ОФОРМЛЕНИЕ ЗАКАЗА</div>
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
        <form action = "orderAddController.php" method = "POST" role = 'form'>
            <div class = form>
                <div class = "label"><label for = "worker_id">Сотрудник</label>
                    <div>
                        <select id = "worker_id" name = "worker_id">
                            <?php
                                for ($i = 0; $i < count($workers_info); $i++)
                                {
                                    $worker_id = $workers_info[$i]["workerID"];
                                    $worker_last_name = $workers_info[$i]["workerLastName"];
                                    $worker_first_name = $workers_info[$i]["workerFirstName"];
                                    $worker_patronymic = $workers_info[$i]["workerPatronymic"];

                                    $a = "";
                                    echo '<option '.$a.' value = "'.$worker_id.'">'.$worker_last_name.' '.$worker_first_name.' '.$worker_patronymic.'</option>';
                                }
                            ?>
                        </select>
                    </div>        
                </div>

                <div class = "label"><label for = "sender_id">Отправитель</label>
                    <div>
                        <select id = "sender_id" name = "sender_id">
                            <?php
                                for ($i = 0; $i < count($clients_info); $i++)
                                {
                                    $sender_id = $clients_info[$i]["clientID"];
                                    $sender_last_name = $clients_info[$i]["clientLastName"];
                                    $sender_first_name = $clients_info[$i]["clientFirstName"];
                                    $sender_patronymic = $clients_info[$i]["clientPatronymic"];

                                    $a = "";
                                    echo '<option '.$a.' value = "'.$sender_id.'">'.$sender_last_name.' '.$sender_first_name.' '.$sender_patronymic.'</option>';
                                }
                            ?>
                        </select>
                    </div>        
                </div>

                <div class = "label"><label for = "corresp_type_id">Тип корреспонденции</label>
                    <div>
                        <select id = "corresp_type_id" name = "corresp_type_id">
                            <?php
                                for ($i = 0; $i < count($corresp_type_info); $i++)
                                {
                                    $corresp_type_id = $corresp_type_info[$i]["correspTypeID"];
                                    $corresp_type_name = $corresp_type_info[$i]["typeName"];

                                    $a = "";
                                    echo '<option '.$a.' value = "'.$corresp_type_id.'">'.$corresp_type_name.'</option>';
                                }
                            ?>
                        </select>
                    </div>        
                </div>

                <div class = label><label for = "corresp_weight">Вес</label>
                    <div>
                        <input id = "corresp_weight" type = "number" step = "any" name = "corresp_weight" required/>
                    </div>        
                </div>

                <div class = "label"><label for = "recipient_id">Получатель</label>
                    <div>
                        <select id = "recipient_id" name = "recipient_id">
                            <?php
                                for ($i = 0; $i < count($clients_info); $i++)
                                {
                                    $recipient_id = $clients_info[$i]["clientID"];
                                    $recipient_last_name = $clients_info[$i]["clientLastName"];
                                    $recipient_first_name = $clients_info[$i]["clientFirstName"];
                                    $recipient_patronymic = $clients_info[$i]["clientPatronymic"];

                                    $a = "";
                                    echo '<option '.$a.' value = "'.$recipient_id.'">'.$recipient_last_name.' '.$recipient_first_name.' '.$recipient_patronymic.'</option>';
                                }
                            ?>
                        </select>
                    </div>        
                </div>

                <div class = "label"><label for = "department_id">Пункт назначения</label>
                    <div>
                        <select id = "department_id" name = "department_id">
                            <?php
                                for ($i = 0; $i < count($departments_info); $i++)
                                {
                                    $department_id = $departments_info[$i]["departmentID"];
                                    $department_region = $departments_info[$i]["departmentRegion"];
                                    $department_city_or_village = $departments_info[$i]["departmentCityOrVillage"];
                                    $department_address = $departments_info[$i]["departmentAddress"];

                                    $a = "";
                                    echo '<option '.$a.' value = "'.$department_id.'">'.$department_region.', '.$department_city_or_village.', '.$department_address.'</option>';
                                }
                            ?>
                        </select>
                    </div>        
                </div>

                <div class = label><label for = "cost">Стоимость</label>
                    <div>
                        <input id = "cost" type = "number" step = "any" name = "cost" required/>
                    </div>        
                </div>

                <div class = label><label for = "reg_date">Дата оформления</label>
                    <div>
                        <input id = "reg_date" type = "date" name = "reg_date" required/>
                    </div>        
                </div>

                <div class = button>
                    <button type = "submit" name = "add">Оформить</button>
                    <button type = "reset" name = "cancellation" onclick = "window.history.back()">Отмена</button>
                </div>
            </div>
        </form>
    </section>
</body>
</html>