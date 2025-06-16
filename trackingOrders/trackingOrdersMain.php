<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link rel = "stylesheet" href = "trackingOrdersStyle.css">
    <title>Отследить заказ по трекинговому коду</title>
</head>
<body>
    <section class = "beginning", id='home'>
        <div class = "title_text">ОТСЛЕДИТЬ ЗАКАЗ ПО ТРЕКИНГОВОМУ КОДУ</div>
    </section>
    <section class = "search_order_status">
        <div class = searchdiv>
            <form action="trackingOrderResult.php" method="GET">
                <div><label for="search_term">Поиск</label></div>
                <div><input type="number" id="search_term" name="search_term" required>
                <button type="submit">Поиск</button></div>
            </form>
        </div>
    </section>
</body>
</html>