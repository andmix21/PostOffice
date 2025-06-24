<?php
include "../functions_db.php";
$order = get_order_info_by_id($_GET['orderEditById']);
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
    <title>Редактирование данных заказа</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">РЕДАКТИРОВАНИЕ ДАННЫХ ЗАКАЗА №<?php echo $_GET['orderEditById'];?></div>
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
        <form action = "orderEditByIdController.php" method = "POST" role = 'form'>
            <input id="id" type="hidden" name="id" value="<?php echo $_GET['orderEditById'];?>"/>
            <div class = form>
                <div class = "label"><label for = "worker_id">Сотрудник</label>
                    <div>
                        <select id = "worker_id" name = "worker_id">
                            <?php
                                $worker_id = $order['workerID'];

                                for ($i = 0; $i < count($workers_info); $i++)
                                {
                                    $id = $workers_info[$i]["workerID"];
                                    $worker_last_name = $workers_info[$i]["workerLastName"];
                                    $worker_first_name = $workers_info[$i]["workerFirstName"];
                                    $worker_patronymic = $workers_info[$i]["workerPatronymic"];

                                    $a = "";
                                    if ($id==$worker_id)
                                    {$a = 'selected';}
                                    echo '<option '.$a.' value = "'.$id.'">'.$worker_last_name.' '.$worker_first_name.' '.$worker_patronymic.'</option>';
                                }
                            ?>
                        </select>
                    </div>        
                </div>

                <div class = "label"><label for = "sender_id">Отправитель</label>
                    <div>
                        <select id = "sender_id" name = "sender_id">
                            <?php
                                $sender_id = $order['senderID'];

                                for ($i = 0; $i < count($clients_info); $i++)
                                {
                                    $id = $clients_info[$i]["clientID"];
                                    $sender_last_name = $clients_info[$i]["clientLastName"];
                                    $sender_first_name = $clients_info[$i]["clientFirstName"];
                                    $sender_patronymic = $clients_info[$i]["clientPatronymic"];

                                    $a = "";
                                    if ($id==$sender_id)
                                    {$a = 'selected';}
                                    echo '<option '.$a.' value = "'.$id.'">'.$sender_last_name.' '.$sender_first_name.' '.$sender_patronymic.'</option>';
                                }
                            ?>
                        </select>
                    </div>        
                </div>

                <div class = "label"><label for = "corresp_type_id">Тип корреспонденции</label>
                    <div>
                        <select id = "corresp_type_id" name = "corresp_type_id">
                            <?php
                                $corresp_type_id = $order['correspTypeID'];

                                for ($i = 0; $i < count($corresp_type_info); $i++)
                                {
                                    $id = $corresp_type_info[$i]["correspTypeID"];
                                    $corresp_type_name = $corresp_type_info[$i]["typeName"];

                                    $a = "";
                                    if ($id==$corresp_type_id)
                                    {$a = 'selected';}
                                    echo '<option '.$a.' value = "'.$id.'">'.$corresp_type_name.'</option>';
                                }
                            ?>
                        </select>
                    </div>        
                </div>

                <div class = label><label for = "corresp_weight">Вес</label>
                    <div>
                        <input id = "corresp_weight" type = "number" step = "any" name = "corresp_weight" value = "<?php echo $order['correspWeight']; ?>" required/>
                    </div>        
                </div>

                <div class = "label"><label for = "recipient_id">Получатель</label>
                    <div>
                        <select id = "recipient_id" name = "recipient_id">
                            <?php
                                $recipient_id = $order['recipientID'];

                                for ($i = 0; $i < count($clients_info); $i++)
                                {
                                    $id = $clients_info[$i]["clientID"];
                                    $recipient_last_name = $clients_info[$i]["clientLastName"];
                                    $recipient_first_name = $clients_info[$i]["clientFirstName"];
                                    $recipient_patronymic = $clients_info[$i]["clientPatronymic"];

                                    $a = "";
                                    if ($id==$recipient_id)
                                    {$a = 'selected';}
                                    echo '<option '.$a.' value = "'.$id.'">'.$recipient_last_name.' '.$recipient_first_name.' '.$recipient_patronymic.'</option>';
                                }
                            ?>
                        </select>
                    </div>        
                </div>

                <div class = "label"><label for = "department_id">Пункт назначения</label>
                    <div>
                        <select id = "department_id" name = "department_id">
                            <?php
                                $department_id = $order['departmentID'];

                                for ($i = 0; $i < count($departments_info); $i++)
                                {
                                    $id = $departments_info[$i]["departmentID"];
                                    $department_region = $departments_info[$i]["departmentRegion"];
                                    $department_city_or_village = $departments_info[$i]["departmentCityOrVillage"];
                                    $department_address = $departments_info[$i]["departmentAddress"];

                                    $a = "";
                                    if ($id==$department_id)
                                    {$a = 'selected';}
                                    echo '<option '.$a.' value = "'.$id.'">'.$department_region.' '.$department_city_or_village.' '.$department_address.'</option>';
                                }
                            ?>
                        </select>
                    </div>        
                </div>

                <div class = label><label for = "cost">Стоимость</label>
                    <div>
                        <input id = "cost" type = "number" step = "any" name = "cost" value = "<?php echo $order['cost']; ?>" required/>
                    </div>        
                </div>

                <div class = label><label for = "reg_date">Дата оформления</label>
                    <div>
                        <input id = "reg_date" type = "date" name = "reg_date" value = "<?php echo $order['regDate']; ?>" required/>
                    </div>        
                </div>

                <div class = button>
                    <button type = "submit" name = "add">Изменить</button>
                    <button type = "reset" name = "cancellation" onclick = "window.history.back()">Отмена</button>
                </div>
            </div>
        </form>
    </section>
</body>
</html>