<?php
include "../functions_db.php";
$status_type = get_status_info_by_id($_GET['statusEditById']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../formPagesStyle.css">
    <title>Редактирование статуса</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">РЕДАКТИРОВАНИЕ СТАТУСА</div>
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
        <form action = "statusEditByIdController.php" method = "POST" role = 'form'>
            <input id="id" type="hidden" name="id" value="<?php echo $_GET['statusEditById'];?>"/>
            <div class = form>
                <div class = label><label for = "status_name">Статус</label>
                    <div>
                        <input id = "status_name" type = "text" name = "status_name" value = "<?php echo $status_type['statusName']; ?>" required/>
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