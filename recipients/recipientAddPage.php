<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "/PostOffice/formPagesStyle.css">
    <title>Добавление получателя</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">ДОБАВЛЕНИЕ ПОЛУЧАТЕЛЯ</div>
    </section>
    <div class="nav">
        <ul>
            <li><a href="#home">Начало</a></li>
            <li><a href="/PostOffice/mainPage/mainPage.html">Главная</a></li>
            <li><a href="/PostOffice/clients/clientsPage.php">Клиенты</a></li>
            <li><a href="/PostOffice/recipients/recipientsPage.php">Получатели</a></li>
            <li><a href="/PostOffice/workers/workersPage.php">Сотрудники</a></li>
            <li><a href="/PostOffice/departments/departmentsPage.php">Почтовые отделения</a></li>
            <li><a href="#games">Заказы</a></li>
        </ul>
    </div>
    <section class = "formSection">
        <form action = "recipientAddController.php" method = "POST" role = 'form'>
            <div class = form>
                <div class = label><label for = "last_name">Фамилия</label>
                    <div>
                        <input id = "last_name" type = "text" name = "last_name"/>
                    </div>        
                </div>

                <div class = label><label for = "first_name">Имя</label>
                    <div>
                        <input id = "first_name" type = "text" name = "first_name"/>
                    </div>        
                </div>

                <div class = label><label for = "patronymic">Отчество</label>
                    <div>
                        <input id = "patronymic" type = "text" name = "patronymic"/>
                    </div>        
                </div>

                <div class = label><label for = "phone">Телефон</label>
                    <div>
                        <input id = "phone" type = "text" name = "phone"/>
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