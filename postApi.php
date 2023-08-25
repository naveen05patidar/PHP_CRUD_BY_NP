<?php

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

        include 'config.php';

        $data = json_decode(file_get_contents("php://input"), true);

        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];


        $insertQuery = "INSERT INTO user_data (name,email,password) VALUES ('$name','$email','$password')";

        $res = mysqli_query($conn,$insertQuery);

        if($res){
            echo json_encode(array('message' => 'Record Inserted.', 'status' => true));
        }else{
            echo json_encode(array('message' => 'Record Not Inserted.', 'status' => false, 'error' => mysqli_error($conn)));
        }



        // header('Content-Type: application/json');
        // header('Access-Control-Allow-Origin: *');
        // header('Access-Control-Allow-Methods: POST');
        // header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

        // include 'config.php';

        // $data = json_decode(file_get_contents("php://input"), true);

        // $name = $data['name'];
        // $email = $data['email'];
        // $password = $data['password'];


        // $insertQuery = "INSERT INTO user_data (np_name,np_email,np_password) VALUES ('$name','$email','$password')";

        // $res = mysqli_query($conn,$insertQuery);

        // if($res){
        //     echo json_encode(array('message' => 'Record Inserted.', 'status' => true));
        // }else{
        //     echo json_encode(array('message' => 'Record Not Inserted.', 'status' => false, 'error' => mysqli_error($conn)));
        // }

?>