<?php

    require '../classes/date-class.php';
    $dates = new Date();

switch($_SERVER['REQUEST_METHOD']){

    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        echo 'Guardar ' . $_POST['name'];
        break;

    case 'GET':
        $response = $dates->getAllDates();
        echo $response;
        break;

    case 'PUT':
        echo 'Usuario editado correctamente';
        break;

    case 'DELETE':
        $dates->deleteSingle($_GET['id']);
        break;
}
$dates = null;
?>