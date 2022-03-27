<?php

    require '../classes/date-class.php';
    $dates = new Date();
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Content-Type: application/json; charset=utf-8');

switch($_SERVER['REQUEST_METHOD']){

    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        $response = $dates->newDate($_POST['name'], $_POST['topic'], $_POST['date']);
        break;

    case 'GET':
        $id = $_GET['id'];
        if($id){
            $response = $dates->getById($id);
            echo $response;
        }else{
            $response = $dates->getAllDates();
            echo $response;
        }
        break;

    case 'PUT':
        $_PUT = json_decode(file_get_contents('php://input'), true);
        $response = $dates->updateDate($_GET['id'], $_PUT['name'], $_PUT['topic'], $_PUT['date']);
        break;

    case 'DELETE':
        $dates->deleteSingle($_GET['id']);
        break;
}
$dates = null;
?>