<?php
$link = false;

//Открытие соединения с БД
function openDB()
{
    global $link;
    $link = mysqli_connect("localhost", "root", "", "post_office");
    mysqli_query($link,"SET NAMES UTF8");
}

//Закрытие соединения с БД
function closeDB() 
{
    global $link;
    mysqli_close($link);
}

//Получение данных из БД
function getAllInfo()
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM clients");
    closeDB();
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

//Получение данных из БД по ID
function getInfoByID($id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM clients WHERE clientID = $id");
    closeDB();
    return mysqli_fetch_assoc($res);
}

//Удаление данных по ID
function deleteInfoByID($id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "DELETE FROM clients WHERE clientID = $id");
    closeDB();
    return $res;
}
?>