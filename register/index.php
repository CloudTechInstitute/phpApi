<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');  
//header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

$requestMethod = $_SERVER["REQUEST_METHOD"];

include('../includes/function.php');


if ($requestMethod == 'POST') {
    $formData = json_decode(file_get_contents("php://input"), true);
    if (empty($formData)) {
        $newUser = registerUser($_POST);
    } else {
        $newUser = registerUser($formData);
    }

    $response = [
        'status' => 200,
        'message' => 'Registration successful',
    ];
    echo json_encode($response);
} else {
    $data = [
        'status' => 405,
        'message' => $requestMethod . " method not allowed",
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}
?>
