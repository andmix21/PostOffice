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
            <li><a href="#home">Начало</a></li>
            <li><a href="/PostOffice/clients/clientsPage.php">Клиенты</a></li>
            <li><a href="/PostOffice/recipients/recipientsPage.php">Получатели</a></li>
            <li><a href="#skills">Сотрудники</a></li>
            <li><a href="/PostOffice/departments/departmentsPage.php">Почтовые отделения</a></li>
            <li><a href="#games">Заказы</a></li>
            <li><a href="#end">Конец</a></li>
        </ul>
    </div>
    <section class = "formSection">
        <form action = "typeOfCorrespAddController.php" method = "POST" role = 'form'>
            <div class = form>
                <div class = label><label for = "corresp_type">Тип</label>
                    <div>
                        <input id = "corresp_type" type = "text" name = "corresp_type"/>
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