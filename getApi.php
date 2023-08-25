<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include "config.php";

$search_value = isset($_GET['search']) ? $_GET['search'] : die("search not found");

$selectQuery = "SELECT * FROM user_data WHERE id = '{$search_value}'";

$query = mysqli_query($conn, $selectQuery);

if ($query) {
    $num = mysqli_num_rows($query);
    
    if ($num > 0) {
        $output = mysqli_fetch_all($query, MYSQLI_ASSOC);
        echo json_encode($output);
    } else {
        echo json_encode(array('message' => 'Record Not Found.', 'status' => false));
    }
} else {
    echo json_encode(array('message' => 'Query Error.', 'status' => false, 'error' => mysqli_error($conn)));
}


?>
