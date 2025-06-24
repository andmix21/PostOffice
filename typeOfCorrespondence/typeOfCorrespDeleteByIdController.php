<?php
include "../functions_db.php";
$corresp_type_del_result = delete_corresp_type_by_id_proc($_GET['typeOfCorrespDelById']);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "typeOfCorrespPageStyle.css">
    <title>Результат удаления типа корреспонденций</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">РЕЗУЛЬТАТ УДАЛЕНИЯ ТИПА КОРРЕСПОНДЕНЦИЙ</div>
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
<section class = "del_corresp_type_result_section">
        <div class = "del_corresp_type_div">
            <div class = del_res_massage><?php echo $corresp_type_del_result ?></div>
            <div class = back_button_div><div class = "add_corresp_type_button"><a href = "typeOfCorrespPage.php">Вернуться обратно</a></div></div>
        </div>
</section>
</body>
</html>