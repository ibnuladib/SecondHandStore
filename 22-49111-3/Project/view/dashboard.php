<?php
session_start();

$cookieMsg = "";
if (!isset($_COOKIE["visit"])) {
    $cookieMsg = "Welcome to my site";
} else {
    $cookieMsg = "Welcome back, " . $_SESSION['fname'];
}

if (!isset($_SESSION['usrname'])) {
    header("Location: login.php");
    exit();
}

require "../model/db.php";
$conn = connect();

$usrn = $_SESSION['usrname'];

// Fetch user data from DB
$sql = "SELECT fname, lname, email, gender, phnum, myfile FROM ProjecWebtech WHERE usrname = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usrn);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
} else {
    header("Location: logout.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>2ndStore</title>
    <link rel="stylesheet" href="../css/mystylesheet.css">
</head>
<body>

    <h1>2ndStore</h1>
    <p id="cookie"><?php echo $cookieMsg; ?></p>

    <div class="firstdiv" style="width: 50%; margin: 30px auto; text-align: center; padding: 30px; border-radius: 15px;">
        
       <img src="../uploads/<?php echo htmlspecialchars($row['myfile']); ?>" 
     alt="Profile Picture"
     style="width: 500px; height: auto; margin-bottom: 20px;">


        <h2><?php echo htmlspecialchars($row['fname'] . ' ' . $row['lname']); ?></h2>
        <p class="field">Email: <?php echo htmlspecialchars($row['email']); ?></p>
        <p class="field">Gender: <?php echo htmlspecialchars($row['gender']); ?></p>
        <p class="field">Phone: <?php echo htmlspecialchars($row['phnum']); ?></p>

        <form method="post" action="../control/logout.php">
            <button type="submit" id="button" style="background-color: #B80038;">Logout</button>
        </form>

    </div>

</body>
</html>
