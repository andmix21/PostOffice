<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "/PostOffice/formPagesStyle.css">
    <title>Добавление чека</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">ДОБАВЛЕНИЕ ЧЕКА</div>
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
        <form action = "receiptAddController.php" method = "POST" role = 'form'>
            <input id="order_id" type="text" name="corresp_id" value="<?php echo $_GET['orderAddReceiptById'];?>"/>
            <div class = form>
                <div class = label><label for = "cost">Фамилия</label>
                    <div>
                        <input id = "cost" type = "number" step = 'any' name = "cost" required/>
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