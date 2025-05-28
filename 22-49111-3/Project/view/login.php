<?php


session_start();
$usrnErr = $passErr = $loginMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../model/db.php";
    $conn = connect();

    $usrn = $_POST['usrname'] ?? '';
    $pass = $_POST['pass'] ?? '';

    if (empty($usrn)) $usrnErr = "Username is required";
    if (empty($pass)) $passErr = "Password is required";

    if (empty($usrnErr) && empty($passErr)) {
        $sql = "SELECT * FROM ProjecWebtech WHERE usrname='$usrn'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row['pass'])) {
                session_start();
                $_SESSION['usrname'] = $row['usrname'];
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['phnum'] = $row['phnum'];
                $_SESSION['myfile'] = $row['myfile'];

                setcookie("visit", 1, time() + 360, "/");

                header("Location: dashboard.php");
                exit();
            } else {
                $loginMsg = "Incorrect password.";
            }
        } else {
            $loginMsg = "Username not found.";
        }
    }
}


?>
<html>
<head>
    <title>Login - 2ndStore</title>
    <link rel="stylesheet" type="text/css" href="../css/mystylesheet.css">
    

</head>
<body>
   
    <div class="login-container">
    <form action="" method="post">
        <h1>2ndStore</h1>
        <p id="motto">Good for the Planet, Great for You.</p>
        <div class="firstdiv">
            <h2>Login</h2>
            <div class="field">
                <!-- <fieldset> -->
                    <!-- <legend>Login Credentials</legend> -->
                    <table>
                        <tr>
                            <td><label for="usrname">Username:</label></td>
                            <td>
                                <input class="logininp" type="text" id="usrname" name="usrname" placeholder="John123">
                                <span class="error"><?php echo $usrnErr ?? ''; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="pass">Password:</label></td>
                            <td>
                                <input class="logininp" type="password" id="pass" name="pass" placeholder="**************">
                                <span class="error"><?php echo $passErr ?? ''; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center;">
                                <input id="button" type="submit" value="Login">
                            </td>
                        </tr>
                    </table>
                    <?php
                        if (isset($loginMsg)) {
                            echo "<p class='error' style='text-align:center;'>$loginMsg</p>";
                        }
                    ?>
                <!-- </fieldset> -->
            </div>
        </div>
    </form>
    </div>
</body>
</html>
