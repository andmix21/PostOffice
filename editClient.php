<?php
include "functions_db.php";
$client = getInfoById($_GET['clientEditByID']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css">
    <title>Редактировать данные клиента</title>
</head>
<body>
    <section class = "beginning">
        <div class = "title_text">ДОБАВЛЕНИЕ НОВОГО КЛИЕНТА</div>
    </section>
    <section class = "form">
        <form action = "clientEditByIDController.php" method = "POST" role = 'form'>
            <input id="id" type="hidden" name="id" value="<?php echo $_GET['clientEditByID'];?>"/>
            <div>
                <div><label for = "fio">ФИО</label>
                    <div>
                        <input id = "fio" type = "text" name = "fio" value = "<?php echo $client['clientName']; ?>"/>
                    </div>        
                </div>

                <div><label for = "passport">Паспорт</label>
                    <div>
                        <input id = "passport" type = "text" name = "passport" value = "<?php echo $client['clientPassport']; ?>"/>
                    </div>        
                </div>

                <div><label for = "phone">Телефон</label>
                    <div>
                        <input id = "phone" type = "phone" name = "phone" value = "<?php echo $client['clientPhone']; ?>"/>
                    </div>        
                </div>

                <button type = "submit" name = "add">Изменить</button>
            </div>
        </form>
    </section>
</body>
</html>