<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
$corresp_type_info = get_all_corresp_type_info();
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "typeOfCorrespPageStyle.css">
    <title>Типы корреспонденций</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">ТИПЫ КОРРЕСПОНДЕНЦИЙ</div>
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
    <section class = "add_type">
        <div class = "add_type_button">
            <a href = "typeOfCorrespAddPage.php">Добавить новый тип</a>
        </div>
    </section>
    <div class = "table">
        <table>
            <thead><th>Код</th><th>Название типа</th><th>Редактировать</th><th>Удалить</th></thead>
            <?php
                for($i = 0; $i < count($corresp_type_info); $i++)
                {
                    $corresp_type_id = $corresp_type_info[$i]["correspTypeID"];
                    $corresp_type_name = $corresp_type_info[$i]["typeName"];
                    echo "<tr><td>$corresp_type_id</td>
                    <td>$corresp_type_name</td>
                    <td><a href = typeOfCorrespEditPage.php?typeOfCorrespEditById=$corresp_type_id><img src = '/PostOffice/Resources/edit.png'</a></td>
                    <td><a href = typeOfCorrespDeleteByIdController.php?typeOfCorrespDelById=$corresp_type_id><img src = '/PostOffice/Resources/cross.png'</a></td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>