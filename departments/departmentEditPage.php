<?php
include "D:/Database/xampp/htdocs/PostOffice/functions_db.php";
$department = get_department_Info_By_ID($_GET['departmentEditById']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "/PostOffice/formPagesStyle.css">
    <title>Редактирование данных отделения</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">РЕДАКТИРОВАНИЕ ДАННЫХ ОТДЕЛЕНИЯ</div>
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
        <form action = "departmentEditByIdController.php" method = "POST" role = 'form'>
            <input id="id" type="hidden" name="id" value="<?php echo $_GET['departmentEditById'];?>"/>
            <div class = form>
                <div class = label><label for = "region">Регион</label>
                    <div>
                        <input id = "region" type = "text" name = "region" value = "<?php echo $department['departmentRegion']; ?>" required/>
                    </div>        
                </div>

                <div class = label><label for = "city_or_village">Населенный пункт</label>
                    <div>
                        <input id = "city_or_village" type = "text" name = "city_or_village" value = "<?php echo $department['departmentCityOrVillage']; ?>" required/>
                    </div>        
                </div>

                <div class = label><label for = "address">Адрес</label>
                    <div>
                        <input id = "address" type = "text" name = "address" value = "<?php echo $department['departmentAddress']; ?>" required/>
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