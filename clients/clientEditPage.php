<?php
include "../functions_db.php";
$client = get_client_info_by_id($_GET['clientEditById']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../formPagesStyle.css">
    <title>Редактирование данных клиента</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">РЕДАКТИРОВАНИЕ ДАННЫХ КЛИЕНТА</div>
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
        <form action = "clientEditByIdController.php" method = "POST" role = 'form'>
            <input id="id" type="hidden" name="id" value="<?php echo $_GET['clientEditById'];?>"/>
            <div class = form>
                <div class = label><label for = "last_name">Фамилия</label>
                    <div>
                        <input id = "last_name" type = "text" name = "last_name" value = "<?php echo $client['clientLastName']; ?>" required/>
                    </div>        
                </div>

                <div class = label><label for = "first_name">Имя</label>
                    <div>
                        <input id = "first_name" type = "text" name = "first_name" value = "<?php echo $client['clientFirstName']; ?>" required/>
                    </div>        
                </div>

                <div class = label><label for = "patronymic">Отчество</label>
                    <div>
                        <input id = "patronymic" type = "text" name = "patronymic" value = "<?php echo $client['clientPatronymic']; ?>" required/>
                    </div>        
                </div>


                <div class = label><label for = "passport">Паспорт</label>
                    <div>
                        <input id = "passport" type = "text" name = "passport" value = "<?php echo $client['clientPassport']; ?>" required/>
                    </div>        
                </div>

                <div class = label><label for = "phone">Телефон</label>
                    <div>
                        <input id = "phone" type = "text" name = "phone" value = "<?php echo $client['clientPhone']; ?>" required/>
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