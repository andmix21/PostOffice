<?php
include "../functions_db.php";
$corresp_type = get_corresp_type_info_by_id($_GET['typeOfCorrespEditById']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../formPagesStyle.css">
    <title>Редактирование типа корреспонденций</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">РЕДАКТИРОВАНИЕ ТИПА КОРРЕСПОНДЕНЦИЙ</div>
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
        <form action = "typeOfCorrespEditByIdController.php" method = "POST" role = 'form'>
            <input id="id" type="hidden" name="id" value="<?php echo $_GET['typeOfCorrespEditById'];?>"/>
            <div class = form>
                <div class = label><label for = "type_name">Тип</label>
                    <div>
                        <input id = "type_name" type = "text" name = "type_name" value = "<?php echo $corresp_type['typeName']; ?>" required/>
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