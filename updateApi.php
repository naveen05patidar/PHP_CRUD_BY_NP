<?php
// include 'config.php';

// header('Content-Type: application/json');
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// $data = json_decode(file_get_contents("php://input"), true);

// $id = $data['id']; 
// $name = $data['name']; 
// $email = $data['email']; 
// $password = $data['password']; 

// echo $id;


// $sql = "UPDATE user_data SET name = '{$name}', email = '{$email}', password = '{$password}' WHERE id = {$id}";

// $result = mysqli_query($conn, $sql);

// if ($result) {
//     echo json_encode(array('message' => 'Record Updated.', 'status' => true));
// } else {
//     echo json_encode(array('message' => 'Record Not Updated.', 'status' => false, 'error' => mysqli_error($conn)));
// }


include 'config.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$id = isset($data['id']) ? $data['id'] : die(json_encode(array('message' => 'ID is not provided.', 'status' => false)));

$name = $data['name'];
$email = $data['email'];
$password = $data['password'];

// Check if the record exists before updating
$checkQuery = "SELECT * FROM user_data WHERE id = {$id}";
$checkResult = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($checkResult) === 0) {
    echo json_encode(array('message' => 'Record Not Found.', 'status' => false));
} else {
    $sql = "UPDATE user_data SET name = '{$name}', email = '{$email}', password = '{$password}' WHERE id = {$id}";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo json_encode(array('message' => 'Record Updated.', 'status' => true));
    } else {
        echo json_encode(array('message' => 'Record Not Updated.', 'status' => false, 'error' => mysqli_error($conn)));
    }
}

?>
