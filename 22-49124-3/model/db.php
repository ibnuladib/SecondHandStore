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
    $sql = "SELECT * FROM sellers WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (!empty($result)) {
        $seller = mysqli_fetch_assoc($result);  
        return $seller;             
    } else {
        return ["error" => "Seller not found"];
    }
}

function updateSeller($conn, $email, $full_name, $phone_number, $business_name, $years_in_business, $business_address) {
    $sql = "UPDATE sellers SET 
                full_name = '$full_name',
                phone_number = '$phone_number',
                business_name = '$business_name',
                years_in_business = $years_in_business,
                business_address = '$business_address'
            WHERE email = '$email'";

    return mysqli_query($conn, $sql);

}

function deleteSellerByEmail($conn, $email) {
    $sql = "DELETE FROM sellers WHERE email = '$email'";
    return mysqli_query($conn, $sql);
}


?>