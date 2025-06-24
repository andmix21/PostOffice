<?php
include "/PostOffice/functions_db.php";
$worker = get_worker_info_by_id($_GET['workerEditById']);
$departments_info = get_all_departments_info();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "/PostOffice/formPagesStyle.css">
    <title>Редактирование данных сотрудника</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">РЕДАКТИРОВАНИЕ ДАННЫХ СОТРУДНИКА</div>
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
    <section class = "formSection">
        <form action = "workerEditByIdController.php" method = "POST" role = 'form'>
            <input id="id" type="hidden" name="id" value="<?php echo $_GET['workerEditById'];?>"/>
            <div class = form>
                <div class = label><label for = "last_name">Фамилия</label>
                    <div>
                        <input id = "last_name" type = "text" name = "last_name" value = "<?php echo $worker['workerLastName']; ?>"/>
                    </div>        
                </div>

                <div class = label><label for = "first_name">Имя</label>
                    <div>
                        <input id = "first_name" type = "text" name = "first_name" value = "<?php echo $worker['workerFirstName']; ?>"/>
                    </div>        
                </div>

                <div class = label><label for = "patronymic">Отчество</label>
                    <div>
                        <input id = "patronymic" type = "text" name = "patronymic" value = "<?php echo $worker['workerPatronymic']; ?>"/>
                    </div>        
                </div>

                <div class = label><label for = "gender">Пол</label>
                    <div>
                        <input id = "gender" type = "text" name = "gender" value = "<?php echo $worker['gender']; ?>"/>
                    </div>        
                </div>

                <div class = label><label for = "date_of_birth">Дата рождения</label>
                    <div>
                        <input id = "date_of_birth" type = "date" name = "date_of_birth" value = "<?php echo $worker['dateOfBirth']; ?>"/>
                    </div>        
                </div>

                <div class = "label"><label for = "department_id">Место работы</label>
                    <div>
                        <select id = "department_id" name = "department_id">
                            <?php
                                $depart_id = $worker['departmentID'];

                                for ($i = 0; $i < count($departments_info); $i++)
                                {
                                    $id = $departments_info[$i]["departmentID"];
                                    $department_region = $departments_info[$i]["departmentRegion"];
                                    $department_city_or_village = $departments_info[$i]["departmentCityOrVillage"];
                                    $department_address = $departments_info[$i]["departmentAddress"];

                                    $a = "";
                                    if ($id==$depart_id)
                                    {$a = 'selected';}
                                    echo '<option '.$a.' value = "'.$id.'">'.$department_region.', '.$department_city_or_village.', '.$department_address.'</option>';
                                }
                            ?>
                        </select>
                    </div>        
                </div>

                <div class = label><label for = "worker_post">Должность</label>
                    <div>
                        <input id = "worker_post" type = "text" name = "worker_post" value = "<?php echo $worker['workerPost']; ?>"/>
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