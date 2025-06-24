<?php
include "../functions_db.php";
$searchTerm = $_GET['search_term'];
$status_order_info = status_order_search($searchTerm);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "trackingOrdersStyle.css">
    <title>Результаты поиска состояний заказа</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">РЕЗУЛЬТАТЫ ПОИСКА СОСТОЯНИЙ ЗАКАЗА №<?php echo $_GET['search_term'] ?></div>
    </section>
    <section class = "indent_section">
    </section>
    <div class = "table">
        <table>
            <thead><th>Статус</th><th colspan = 3>Пункт фиксации</th><th>Дата фиксации</th></thead>
            <?php
                foreach ($status_order_info as $status_order)
                {
                    $status_name = $status_order["statusName"];
                    $department_region = $status_order["departmentRegion"];
                    $department_city_or_village = $status_order["departmentCityOrVillage"];
                    $department_address = $status_order["departmentAddress"];
                    $date_of_fix = $status_order["dateOfFix"];
                    echo "<tr>
                    <td>$status_name</td>
                    <td>$department_region</td>
                    <td>$department_city_or_village</td>
                    <td>$department_address</td>
                    <td>$date_of_fix</td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>