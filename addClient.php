<?php
include "functions_db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css">
    <title>Добавление клиента</title>
</head>
<body>
    <section class = "beginning">
        <div class = "title_text">ДОБАВЛЕНИЕ НОВОГО КЛИЕНТА</div>
    </section>
    <section class = "form">
        <form action = "addClientController.php" method = "POST" role = 'form'>
            <div class>
                <div><label for = "fio">ФИО</label>
                    <div>
                        <input id = "fio" type = "text" name = "fio"/>
                    </div>        
                </div>

                <div><label for = "passport">Паспорт</label>
                    <div>
                        <input id = "passport" type = "text" name = "passport"/>
                    </div>        
                </div>

                <div><label for = "phone">Телефон</label>
                    <div>
                        <input id = "phone" type = "phone" name = "phone"/>
                    </div>        
                </div>

                <button type = "submit" name = "add">Добавить</button>
            </div>
        </form>
    </section>
</body>
</html>