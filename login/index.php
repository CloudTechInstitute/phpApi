<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

$requestMethod = $_SERVER["REQUEST_METHOD"];

include('../includes/function.php');

if($requestMethod=='GET'){

    $loggedUser = getLoggedUser();
    echo $loggedUser;

}else{

    $data = [
        'status' => 405,
        'message' => $requestMethod . " method not allowed",
    ];
    header("HHTP/1.0 405 Method not allowed");
    echo json_encode($data);
}

?>