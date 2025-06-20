<?php
include "/PostOffice/functions_db.php";
$status_order_info = get_status_order_info_by_id($_GET['statusOrderEditById']);
$status_info = get_all_status_info();
$departments_info = get_all_departments_info();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "/PostOffice/formPagesStyle.css">
    <title>Редактирование состояния заказа</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">РЕДАКТИРОВАНИЕ СОСТОЯНИЯ ЗАКАЗА №<?php echo $status_order_info['orderID'];?></div>
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
        <form action = "statusOrderEditByIdController.php" method = "POST" role = 'form'>
            <input id="id" type="hidden" name="id" value="<?php echo $_GET['statusOrderEditById'];?>"/>
            <input id="order_id" type="hidden" name="order_id" value="<?php echo $status_order_info['orderID'];?>"/>
            <div class = form>
                <div class = "label"><label for = "status_id">Статус</label>
                    <div>
                        <select id = "status_id" name = "status_id">
                            <?php
                                $status_id = $status_order_info['statusID'];

                                for ($i = 0; $i < count($status_info); $i++)
                                {
                                    $id = $status_info[$i]["statusID"];
                                    $status_name = $status_info[$i]["statusName"];

                                    $a = "";
                                    if ($id==$status_id)
                                    {$a = 'selected';}
                                    echo '<option '.$a.' value = "'.$id.'">'.$status_name.'</option>';
                                }
                            ?>
                        </select>
                    </div>        
                </div>

                <div class = "label"><label for = "department_id">Клиент</label>
                    <div>
                        <select id = "department_id" name = "department_id">
                            <?php
                                $department_id = $status_order_info['departmentID'];

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

                <div class = label><label for = "date_of_fix">Дата фиксации</label>
                    <div>
                        <input id = "date_of_fix" type = "date" name = "date_of_fix" value = "<?php echo $status_order_info['dateOfFix']; ?>" required/>
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