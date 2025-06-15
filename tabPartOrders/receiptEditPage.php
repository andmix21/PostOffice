<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
$receipt = get_receipt_info_by_id($_GET['receiptEditById']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "/PostOffice/formPagesStyle.css">
    <title>Редактирование стоимости</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">РЕДАКТИРОВАНИЕ СТОИМОСТИ</div>
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
        <form action = "receiptEditByIdController.php" method = "POST" role = 'form'>
            <input id="id" type="hidden" name="id" value="<?php echo $_GET['receiptEditById'];?>"/>
            <input id="order_id" type="hidden" name="order_id" value="<?php echo $receipt['orderID'];?>"/>
            <div class = form>
                <div class = label><label for = "cost">Стоимость</label>
                    <div>
                        <input id = "cost" type = "text" name = "cost" value = "<?php echo $receipt['cost']; ?>" required/>
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