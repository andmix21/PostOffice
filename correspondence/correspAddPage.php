<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
$corresp_type_info = get_all_corresp_type_info();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "/PostOffice/formPagesStyle.css">
    <title>Добавление новой корреспонденции</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">ДОБАВЛЕНИЕ НОВОЙ КОРРЕСПОНДЕНЦИИ</div>
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
        <form action = "correspAddController.php" method = "POST" role = 'form'>
            <div class = form>
                <div class = "label"><label for = "corresp_type_id">Тип</label>
                    <div>
                        <select id = "corresp_type_id" name = "corresp_type_id">
                            <?php
                                for ($i = 0; $i < count($corresp_type_info); $i++)
                                {
                                    $corresp_type_id = $corresp_type_info[$i]["correspTypeID"];
                                    $type_name = $corresp_type_info[$i]["typeName"];

                                    $a = "";
                                    echo '<option '.$a.' value = "'.$corresp_type_id.'">'.$type_name.'</option>';
                                }
                            ?>
                        </select>
                    </div>        
                </div>

                <div class = label><label for = "corresp_weight">Вес</label>
                    <div>
                        <input id = "corresp_weight" type = "number" step = 'any' name = "corresp_weight" required/>
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