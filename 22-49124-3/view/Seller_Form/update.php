<?php
include '../../model/db.php';  

$conn = connectDatabase();

$email = $_GET['email'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? ''; 

    $full_name = $_POST['full_name'] ?? '';
    $phone_number = $_POST['phone_number'] ?? '';
    $business_name = $_POST['business_name'] ?? '';
    $years_in_business = $_POST['years_in_business'] ?? 0;
    $business_address = $_POST['business_address'] ?? '';

    $updated = updateSeller($conn, $email, $full_name, $phone_number, $business_name, $years_in_business, $business_address);

    if ($updated) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<p>Failed to update seller.</p>";
    }
}

if (!empty($email)) {
    $sellerData = getSellerByEmail($conn, $email);
}

closeDatabase($conn);
?>

<h2>Update Seller Information</h2>
<form method="post"action="update.php">
    <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
    
    <label>Full Name:</label><br>
    <input type="text" name="full_name" value="<?= htmlspecialchars($sellerData['full_name'] ?? '') ?>"><br><br>

    <label>Phone Number:</label><br>
    <input type="text" name="phone_number" value="<?= htmlspecialchars($sellerData['phone_number'] ?? '') ?>"><br><br>

    <label>Business Name:</label><br>
    <input type="text" name="business_name" value="<?= htmlspecialchars($sellerData['business_name'] ?? '') ?>"><br><br>

    <label>Years in Business:</label><br>
    <input type="number" name="years_in_business" value="<?= htmlspecialchars($sellerData['years_in_business'] ?? '') ?>"><br><br>

    <label>Business Address:</label><br>
    <input type="text" name="business_address" value="<?= htmlspecialchars($sellerData['business_address'] ?? '') ?>"><br><br>

    <button type="submit">Update</button>
</form>
