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
function deleteClientByID($id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "DELETE FROM clients WHERE clientID = $id");
    closeDB();
    return $res;
}

//Добавление нового клиента
function addNewClient($fio, $passport, $phone)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "INSERT INTO clients (clientName, clientPassport, clientPhone) VALUE ('$fio', '$passport', '$phone')");
    closeDB();
    return $res;
}

function edit_client_by_id($id, $fio, $passport, $phone)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "UPDATE clients SET clientName = '$fio', clientPassport = '$passport', clientPhone = '$phone' WHERE clientID = $id");
    closeDB();
    return $res;
}
?>