<?php
session_start();
if (!isset($_SESSION['emailuser'])) {
    header("Location: form.php");
    die();
}

include '../../model/db.php'; 
$conn = connectDatabase();

$email = $_POST['email'] ?? '';

$sellerData = null;
if (!empty($email)) {
    $sellerData = json_decode(getSellerByEmail($conn, $email), true);
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

    <h2>Welcome, <?= htmlspecialchars($_SESSION['emailuser']) ?></h2>

    <form method="post">
        <label for="email">Search seller by email:</label>
        <input name="email" id="email">
        <button type="submit">Search</button>
    </form>

    <form method="post" action="logout.php">
        <button class="logout-btn" type="submit">Logout</button>
    </form>

    <?php if ($sellerData): ?>
        <div class="seller-info">
            <h3>Seller Details:</h3>
            <?php if (isset($sellerData['error'])): ?>
                <p><?= htmlspecialchars($sellerData['error']) ?></p>
            <?php else: ?>
                <ul>
                    <?php foreach ($sellerData as $key => $value): ?>
                        <?php if ($key === 'profile_picture'): ?>
                            <li>
                                <strong><?= htmlspecialchars($key) ?>:</strong><br>
                                <img src="<?= $value ?>" alt="Profile Picture"> 
                        <?php else: ?>
                            <li><strong><?= htmlspecialchars($key) ?>:</strong> <?= htmlspecialchars($value) ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    <?php endif; ?>


</body>
</html>
