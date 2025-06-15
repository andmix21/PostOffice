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
    $res = mysqli_query($link, "SELECT * FROM workers JOIN departments ON workers.departmentID = departments.departmentID ORDER BY workerLastName");
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

//Добавление нового сотрудника
function add_new_worker($last_name, $first_name, $patronymic, $gender, $date_of_birth, $department_id, $worker_post)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "INSERT INTO workers (workerLastName, workerFirstName, workerPatronymic, gender, dateOfBirth, departmentID, workerPost) VALUE ('$last_name', '$first_name','$patronymic', '$gender', '$date_of_birth', '$department_id', '$worker_post')");
    closeDB();
    return $res;
}
//Редактирование данных по ID
function edit_worker_by_id($worker_id, $last_name, $first_name, $patronymic, $gender, $date_of_birth, $department_id, $worker_post)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "UPDATE workers SET workerLastName = '$last_name', workerFirstName = '$first_name', workerPatronymic = '$patronymic', gender = '$gender', dateOfBirth = '$date_of_birth', departmentID = '$department_id', workerPost = '$worker_post' WHERE workerID = $worker_id");
    closeDB();
    return $res;
}

//Удаление данных по ID
function delete_worker_by_id($worker_id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "DELETE FROM workers WHERE workerID = $worker_id");
    closeDB();
    return $res;
}

//Поиск сотрудника
function worker_search($searchWorker)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM workers JOIN departments ON workers.departmentID = departments.departmentID WHERE workerLastName LIKE '%$searchWorker%' OR workerFirstName LIKE '%$searchWorker%' OR workerPatronymic LIKE '%$searchWorker%' OR workerPost LIKE '%$searchWorker%' ORDER BY workerLastName");
    closeDB();
    return $res;
}

//------------------------------Работа с таблицей "orders"------------------------------

//Получение данных из таблицы
function get_all_orders_info()
{
    global $link;
    openDB();
    $res = mysqli_query($link, "CALL orders_info()");
    closeDB();
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

//Получение данных из таблицы по ID
function get_order_info_by_id($id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM orders WHERE orderID = $id");
    closeDB();
    return mysqli_fetch_assoc($res);
}

//Добавление нового заказа
function add_new_order($worker_id, $client_id, $corresp_type_id, $corresp_weight, $recipient_id, $department_id, $reg_date)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "INSERT INTO orders (workerID, clientID, correspTypeID, correspWeight, recipientID, departmentID, regDate) VALUE ('$worker_id', '$client_id', '$corresp_type_id', '$corresp_weight', '$recipient_id', '$department_id', '$reg_date')");
    closeDB();
    return $res;
}
//Редактирование данных по ID
function edit_order_by_id($id, $worker_id, $client_id, $corresp_type_id, $corresp_weight, $recipient_id, $department_id, $reg_date)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "UPDATE orders SET workerID = '$worker_id', clientID = '$client_id', correspTypeID = '$corresp_type_id', correspWeight = '$corresp_weight', recipientID = '$recipient_id', departmentID = '$department_id', regDate = '$reg_date' WHERE orderID = '$id'");
    closeDB();
    return $res;
}

//Удаление данных по ID
function delete_order_by_id($order_id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "DELETE FROM orders WHERE orderID = $order_id");
    closeDB();
    return $res;
}

//Поиск заказа по трек. коду
function order_search($searchOrder)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "CALL search_order($searchOrder)");
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

//------------------------------Работа с таблицей "paymentreceipts"------------------------------
//Получение данных из таблицы
function get_all_receipts_info()
{
    global $link;
    openDB();
    $res = mysqli_query($link, "CALL orders_receipts()");
    closeDB();
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

//Получение данных из таблицы по ID
function get_receipt_info_by_id($id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "SELECT * FROM paymentreceipts WHERE paymentreceiptID = $id");
    closeDB();
    return mysqli_fetch_assoc($res);
}

//Добавление нового чека
function add_new_receipt($order_id, $cost)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "INSERT INTO paymentreceipts (orderID, cost) VALUE ('$order_id', '$cost')");
    closeDB();
    return $res;
}
//Редактирование данных по ID
function edit_receipt_by_id($id, $order_id, $cost)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "UPDATE paymentreceipts SET orderID = '$order_id', cost = '$cost' WHERE paymentreceiptID = $id");
    closeDB();
    return $res;
}

//Удаление данных по ID
function delete_receipt_by_id($receipt_id)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "DELETE FROM paymentreceipts WHERE paymentreceiptID = $receipt_id");
    closeDB();
    return $res;
}

//Поиск чека по коду заказа
function receipt_search($search_receipt)
{
    global $link;
    openDB();
    $res = mysqli_query($link, "CALL search_pay_receipt($search_receipt)");
    closeDB();
    return $res;
}
?>