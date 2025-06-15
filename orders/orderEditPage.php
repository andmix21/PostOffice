<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
$order = get_order_info_by_id($_GET['orderEditById']);
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
    <title>Редактирование данных клиента</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">РЕДАКТИРОВАНИЕ ДАННЫХ КЛИЕНТА</div>
    </section>
    <div class="nav">
        <ul>
            <li><a href="#home">Начало</a></li>
            <li><a href="/PostOffice/mainPage/mainPage.html">Главная</a></li>
            <li><a href="/PostOffice/clients/clientsPage.php">Клиенты</a></li>
            <li><a href="/PostOffice/recipients/recipientsPage.php">Получатели</a></li>
            <li><a href="/PostOffice/workers/workersPage.php">Сотрудники</a></li>
            <li><a href="/PostOffice/departments/departmentsPage.php">Почтовые отделения</a></li>
            <li><a href="/PostOffice/orders/ordersPage.php">Заказы</a></li>
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

                <div class = "label"><label for = "client_id">Клиент</label>
                    <div>
                        <select id = "client_id" name = "client_id">
                            <?php
                                $client_id = $order['clientID'];

                                for ($i = 0; $i < count($clients_info); $i++)
                                {
                                    $id = $clients_info[$i]["clientID"];
                                    $client_last_name = $clients_info[$i]["clientLastName"];
                                    $client_first_name = $clients_info[$i]["clientFirstName"];
                                    $client_patronymic = $clients_info[$i]["clientPatronymic"];

                                    $a = "";
                                    if ($id==$client_id)
                                    {$a = 'selected';}
                                    echo '<option '.$a.' value = "'.$id.'">'.$client_last_name.' '.$client_first_name.' '.$client_patronymic.'</option>';
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

                                for ($i = 0; $i < count($recipients_info); $i++)
                                {
                                    $id = $recipients_info[$i]["recipientID"];
                                    $recipient_last_name = $recipients_info[$i]["recipientLastName"];
                                    $recipient_first_name = $recipients_info[$i]["recipientFirstName"];
                                    $recipient_patronymic = $recipients_info[$i]["recipientPatronymic"];

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