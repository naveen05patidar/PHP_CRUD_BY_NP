<?php
// include "config.php";

// header('Content-Type: application/json');
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// $search_value = isset($_GET['search'])?$_GET['search']:die("search is not given");

// $selectQuery = "SELECT * FROM user_data WHERE id = '{$search_value}'";

// $query = mysqli_query($conn, $selectQuery);

// if($num = mysqli_num_rows($query)< 0){
//     echo "Record Not Found";
// }


// $sql = "DELETE FROM user_data WHERE id = '{$search_value}'";

// $result = mysqli_query($conn,$sql);

// if($result){
//     echo json_encode(array('message'=>"data deleted successfully","success"=>true));
// }else{
//     echo json_encode(array('message'=>"data deleted successfully","success"=>true,"error"=>mysqli_error($conn)));
// }

include "config.php";

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$search_value = isset($_GET['search']) ? $_GET['search'] : die(json_encode(array('message' => 'Search value is not provided.', 'success' => false)));

$selectQuery = "SELECT * FROM user_data WHERE id = '{$search_value}'";

$query = mysqli_query($conn, $selectQuery);

if (!$query) {
    echo json_encode(array('message' => 'Error executing query.', 'success' => false));
} else {
    $num = mysqli_num_rows($query);
    if ($num <= 0) {
        echo json_encode(array('message' => 'Record Not Found', 'success' => false));
    } else {
        $sql = "DELETE FROM user_data WHERE id = '{$search_value}'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo json_encode(array('message' => 'Data deleted successfully', 'success' => true));
        } else {
            echo json_encode(array('message' => 'Error deleting data', 'success' => false, 'error' => mysqli_error($conn)));
        }
    }
}
?>
