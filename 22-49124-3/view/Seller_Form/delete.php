<?php
include "../../model/db.php"

$conn = connectDatabase();
$email = $_POST['email'] ?? '';

if (!empty($email)) {
    if (deleteSellerByEmail($conn, $email)) {
        echo "Seller deleted successfully.";
    } else {
        echo "Failed to delete seller.";
    }
}

closeDatabase($conn);
?>