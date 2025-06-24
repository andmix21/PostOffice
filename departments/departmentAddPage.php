<?php
include "../functions_db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../formPagesStyle.css">
    <title>Добавление почтового отделения</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">ДОБАВЛЕНИЕ ПОЧТОВОГО ОТДЕЛЕНИЯ</div>
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
        <form action = "departmentAddController.php" method = "POST" role = 'form'>
            <div class = form>
                <div class = label><label for = "region">Регион</label>
                    <div>
                        <input id = "region" type = "text" name = "region" required/>
                    </div>        
                </div>

                <div class = label><label for = "city_or_village">Населенный пункт</label>
                    <div>
                        <input id = "city_or_village" type = "text" name = "city_or_village" required/>
                    </div>        
                </div>

                <div class = label><label for = "address">Адрес</label>
                    <div>
                        <input id = "address" type = "text" name = "address" required/>
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