<?php

include('../connection/connection.php');

function getLoggedUser(){

    global $conn;

    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);

    if($result){

        if(mysqli_num_rows($result)>0){
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $data = [
                'status' => 200,
                'message' => 'record found',
                'data' => $res
            ];
            header("HTTP/1.0 200 record found");
            return json_encode($data);
        }else{
            $data = [
                'status' => 404,
                'message' => 'record not found'
            ];
            header("HTTP/1.0 404 record not found");
            return json_encode($data);
        }
    }else{
        $data = [
            'status' => 500,
            'message' => 'internal server error'
        ];
        header("HTTP/1.0 500 internal server error");
        return json_encode($data);
    }
}

function registerUser($formInput){

    global $conn;

    $fname = mysqli_real_escape_string($conn, $formInput['firstname']);
    $lname = mysqli_real_escape_string($conn, $formInput['lastname']);
    $email = mysqli_real_escape_string($conn, $formInput['email']);
    $phone = mysqli_real_escape_string($conn, $formInput['phone']);
    $password = mysqli_real_escape_string($conn, $formInput['password']);

    $regQuery = "INSERT INTO users(`fname`, `lname`, `email`, `phone`, `password`) VALUES('$fname','$lname','$email','$phone','$password')";
    $regResult = mysqli_query($conn, $regQuery);

    if($regResult){
            $data = [
                'status' => 201,
                'message' => 'User registered',
            ];
            header("HTTP/1.0 201 registration successful");
            return json_encode($data);
    }else{
        $data = [+
            'status' => 500,
            'message' => 'Could not add user'
        ];
        header("HTTP/1.0 500 internal server error");
        return json_encode($data);
    }
}

?>