<?php
function connectDatabase() {
    $host = 'localhost';
    $db = 'mydb';
    $user = 'root';
    $pass = '';

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    return $conn;
}

function closeDatabase($conn) {
    $conn->close();
}


function insertData($conn, $full_name, $email, $password, $phone_number, $business_name, $store_type, $years_in_business, $business_address, $categories, $profile_picture) {
    $sql="INSERT INTO sellers(full_name, email, password, phone_number, business_name, store_type,
        years_in_business, business_address, categories, profile_picture)
     VALUES (
                '$full_name', '$email', '$password', '$phone_number', 
                '$business_name', '$store_type', $years_in_business, 
                '$business_address', '$categories', '$profile_picture'
            )";
    return mysqli_query($conn,$sql);
}

function getSellerByEmail($conn, $email) {
    $sql = "SELECT * FROM sellers WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (!empty($result)) {
        $seller = mysqli_fetch_object($result);  
        return json_encode($seller);             
    } else {
        return json_encode(["error" => "Seller not found"]);
    }
}





?>