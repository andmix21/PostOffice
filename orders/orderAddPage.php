<?php
include "/PostOffice/functions_db.php";
$workers_info = get_all_workers_info();
$clients_info = get_all_clients_info();
$corresp_type_info = get_all_corresp_type_info();
$recipients_info = get_all_recipient_info();
$departments_info = get_all_departments_info();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "/PostOffice/formPagesStyle.css">
    <title>Оформление заказа</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">ОФОРМЛЕНИЕ ЗАКАЗА</div>
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

                <div class = "label"><label for = "client_id">Клиент/Отправитель</label>
                    <div>
                        <select id = "client_id" name = "client_id">
                            <?php
                                for ($i = 0; $i < count($clients_info); $i++)
                                {
                                    $client_id = $clients_info[$i]["clientID"];
                                    $client_last_name = $clients_info[$i]["clientLastName"];
                                    $client_first_name = $clients_info[$i]["clientFirstName"];
                                    $client_patronymic = $clients_info[$i]["clientPatronymic"];

                                    $a = "";
                                    echo '<option '.$a.' value = "'.$client_id.'">'.$client_last_name.' '.$client_first_name.' '.$client_patronymic.'</option>';
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
                                for ($i = 0; $i < count($recipients_info); $i++)
                                {
                                    $recipient_id = $recipients_info[$i]["recipientID"];
                                    $recipient_last_name = $recipients_info[$i]["recipientLastName"];
                                    $recipient_first_name = $recipients_info[$i]["recipientFirstName"];
                                    $recipient_patronymic = $recipients_info[$i]["recipientPatronymic"];

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