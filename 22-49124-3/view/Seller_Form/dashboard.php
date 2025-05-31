<?php
session_start();
if (!isset($_SESSION['emailuser'])) {
    header("Location: form.php");
    die();
}

$emailUser = $_SESSION['emailuser'];

include '../../model/db.php'; 
$conn = connectDatabase();

$email = $_POST['email'] ?? '';

$sellerData = null;
if (!empty($email)) {
    $sellerData = getSellerByEmail($conn, $email);
    //$sellerData = getSellerByEmail($conn, $email), true);
}
closeDatabase($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link rel="stylesheet" href="../../style/sellerformstyle.css">
</head>
<body>

    <h2>Welcome, <?= $_SESSION['emailuser'] ?></h2>

    <form method="post">
        <label for="email">Search seller by email:</label>
        <input name="email" id="email">
        <button type="submit">Search</button>
    </form>

    <form method="post" action="logout.php">
        <button class="logout-btn" type="submit">Logout</button>
    </form>

    <form method="post" action="delete.php">
        <button class="logout-btn" type="submit">Delete Account</button>
    </form>

<form method="get" action="update.php">
    <input type="hidden" name="email" value="<?= $emailUser ?>">
    <button class="logout-btn" type="submit">Update Account</button>
</form>


<?php
if ($sellerData) {
    echo '<div class="seller-info">';
    echo '<h3>Seller Details:</h3>';


        foreach ($sellerData as $key => $value) {
            if ($key === 'profile_picture') {
                echo '<li>';
                echo '<strong>' . $key. ':</strong><br>';
                echo '<img src="' . $value . '" alt="Profile Picture">';
                echo '</li>';
            } else {
                echo '<li>';
                echo '<strong>' . $key . ':</strong> ' . $value;
                echo '</li>';
            }
        }

        echo '</ul>';
    }

    echo '</div>';

?>



</body>
</html>
