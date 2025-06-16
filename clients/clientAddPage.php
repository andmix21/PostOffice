<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "/PostOffice/formPagesStyle.css">
    <title>Добавление клиента</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">ДОБАВЛЕНИЕ КЛИЕНТА</div>
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
        <form action = "clientAddController.php" method = "POST" role = 'form'>
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

                <div class = label><label for = "passport">Паспорт</label>
                    <div>
                        <input id = "passport" type = "text" name = "passport" required/>
                    </div>        
                </div>

                <div class = label><label for = "phone">Телефон</label>
                    <div>
                        <input id = "phone" type = "text" name = "phone" required/>
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