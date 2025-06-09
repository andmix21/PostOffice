<?php
$link = false;

//------------------------------Соединение с БД "postoffice"------------------------------

//Открытие соединения с БД
function openDB()
{
    global $link;
    $link = mysqli_connect("localhost", "root", "", "postoffice");
    mysqli_query($link,"SET NAMES UTF8");
}

//Закрытие соединения с БД
function closeDB() 
{
    global $link;
    mysqli_close($link);
}

//------------------------------Работа с таблицей "clients"------------------------------

//Получение данных из таблицы
function get_all_clients_info()
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM clients ORDER BY clientLastName");
    closeDB();
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

//Получение данных из таблицы по ID
function get_client_info_by_id($id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM clients WHERE clientID = $id");
    closeDB();
    return mysqli_fetch_assoc($res);
}

//Добавление нового клиента
function add_new_client($last_name, $first_name, $patronymic, $passport, $phone)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "INSERT INTO clients (clientLastName, clientFirstName, clientPatronymic, clientPassport, clientPhone) VALUE ('$last_name', '$first_name','$patronymic', '$passport', '$phone')");
    closeDB();
    return $res;
}
//Редактирование данных по ID
function edit_client_by_id($client_id, $last_name, $first_name, $patronymic, $passport, $phone)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "UPDATE clients SET clientLastName = '$last_name', clientFirstName = '$first_name', clientPatronymic = '$patronymic', clientPassport = '$passport', clientPhone = '$phone' WHERE clientID = $client_id");
    closeDB();
    return $res;
}

//Удаление данных по ID
function delete_client_by_id($client_id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "DELETE FROM clients WHERE clientID = $client_id");
    closeDB();
    return $res;
}
//Поиск клиента
function client_search($searchClient)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM clients WHERE clientLastName LIKE '%$searchClient%' OR clientFirstName LIKE '%$searchClient%' OR clientPatronymic LIKE '%$searchClient%' OR clientPassport LIKE '%$searchClient%' OR clientPhone LIKE '%$searchClient%' ORDER BY clientLastName");
    closeDB();
    return $res;
}

//------------------------------Работа с таблицей "recipients"------------------------------

//Получение данных из таблицы
function get_all_recipient_info()
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM recipients ORDER BY recipientLastName");
    closeDB();
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

//Получение данных из таблицы по ID
function get_recipient_info_by_id($id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM recipients WHERE recipientID = $id");
    closeDB();
    return mysqli_fetch_assoc($res);
}

//Добавление нового получателя
function add_new_recipient($last_name, $first_name, $patronymic, $phone)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "INSERT INTO recipients (recipientLastName, recipientFirstName, recipientPatronymic, recipientPhone) VALUE ('$last_name', '$first_name','$patronymic', '$phone')");
    closeDB();
    return $res;
}
//Редактирование данных по ID
function edit_recipient_by_id($recipient_id, $last_name, $first_name, $patronymic, $phone)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "UPDATE recipients SET recipientLastName = '$last_name', recipientFirstName = '$first_name', recipientPatronymic = '$patronymic', recipientPhone = '$phone' WHERE recipientID = $recipient_id");
    closeDB();
    return $res;
}

//Удаление данных по ID
function delete_recipient_by_id($recipient_id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "DELETE FROM recipients WHERE recipientID = $recipient_id");
    closeDB();
    return $res;
}

//Поиск получателя
function recipient_search($searchRecipient)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM recipients WHERE recipientLastName LIKE '%$searchRecipient%' OR recipientFirstName LIKE '%$searchRecipient%' OR recipientPatronymic LIKE '%$searchRecipient%' OR recipientPhone LIKE '%$searchRecipient%' ORDER BY recipientLastName");
    closeDB();
    return $res;
}

//------------------------------Работа с таблицей "departments"------------------------------

//Получение данных из таблицы
function get_all_departments_info()
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM departments ORDER BY departmentRegion");
    closeDB();
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

//Получение данных из таблицы по ID
function get_department_Info_By_ID($id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM departments WHERE departmentID = $id");
    closeDB();
    return mysqli_fetch_assoc($res);
}

//Добавление нового отделения
function add_new_department($region, $city_or_village, $address)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "INSERT INTO departments (departmentRegion, departmentCityOrVillage, departmentAddress) VALUE ('$region', '$city_or_village','$address')");
    closeDB();
    return $res;
}
//Редактирование данных по ID
function edit_department_by_id($id, $region, $city_or_village, $address)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "UPDATE departments SET departmentRegion = '$region', departmentCityOrVillage = '$city_or_village', departmentAddress = '$address' WHERE departmentID = $id");
    closeDB();
    return $res;
}

//Удаление данных по ID
function delete_department_by_id($department_id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "DELETE FROM departments WHERE departmentID = $department_id");
    closeDB();
    return $res;
}
//Поиск отделения
function department_search($searchDepartment)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM departments WHERE departmentRegion LIKE '%$searchDepartment%' OR departmentCityOrVillage LIKE '%$searchDepartment%' OR departmentAddress LIKE '%$searchDepartment%' ORDER BY departmentRegion");
    closeDB();
    return $res;
}

//------------------------------Работа с таблицей "corresptype"------------------------------

//Получение данных из таблицы
function get_all_corresp_type_info()
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM corresptype ORDER BY typeName");
    closeDB();
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

//Получение данных из таблицы по ID
function get_corresp_type_info_by_id($id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM corresptype WHERE correspTypeID = $id");
    closeDB();
    return mysqli_fetch_assoc($res);
}

//Добавление нового типа
function add_new_corresp_type($corresp_name)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "INSERT INTO corresptype (typeName) VALUE ('$corresp_name')");
    closeDB();
    return $res;
}
//Редактирование данных по ID
function edit_corresp_type_by_id($id, $corresp_name)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "UPDATE corresptype SET typeName = '$corresp_name' WHERE correspTypeID = $id");
    closeDB();
    return $res;
}

//Удаление данных по ID
function delete_corresp_type_by_id($corresp_type_id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "DELETE FROM corresptype WHERE correspTypeID = $corresp_type_id");
    closeDB();
    return $res;
}

//Поиск типа
function corresp_type_search($searchCorrespType)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM corresptype WHERE typeName LIKE '%$searchCorrespType%' ORDER BY typeName");
    closeDB();
    return $res;
}

//------------------------------Работа с таблицей "workers"------------------------------

//Получение данных из таблицы
function get_all_workers_info()
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM workers JOIN department ON workers.departmentID = departments.departmentID ORDER BY workerLastName");
    closeDB();
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

//Получение данных из таблицы по ID
function get_worker_info_by_id($id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM workers WHERE workerID = $id");
    closeDB();
    return mysqli_fetch_assoc($res);
}

//Добавление нового клиента
function add_new_worker($last_name, $first_name, $patronymic, $gender, $dateOfBirth, $department_id, $wPost)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "INSERT INTO workers (workerLastName, workerFirstName, workerPatronymic, gender, dateOfBirth, workerPost) VALUE ('$last_name', '$first_name','$patronymic', '$gender', '$dateOfBirth')");
    closeDB();
    return $res;
}





//------------------------------Работа с таблицей "status"------------------------------

//Получение данных из таблицы
function get_all_status_info()
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM statusoforders ORDER BY statusName");
    closeDB();
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

//Получение данных из таблицы по ID
function get_status_info_by_id($id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM statusoforders WHERE statusID = $id");
    closeDB();
    return mysqli_fetch_assoc($res);
}

//Добавление нового типа
function add_new_status($status_name)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "INSERT INTO statusoforders (statusName) VALUE ('$status_name')");
    closeDB();
    return $res;
}
//Редактирование данных по ID
function edit_status_by_id($id, $status_name)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "UPDATE statusoforders SET statusName = '$status_name' WHERE statusID = $id");
    closeDB();
    return $res;
}

//Удаление данных по ID
function delete_status_by_id($status_id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "DELETE FROM statusoforders WHERE statusID = $status_id");
    closeDB();
    return $res;
}

//Поиск типа
function status_search($searchStatus)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM statusoforders WHERE statusName LIKE '%$searchStatus%' ORDER BY statusName");
    closeDB();
    return $res;
}
?>