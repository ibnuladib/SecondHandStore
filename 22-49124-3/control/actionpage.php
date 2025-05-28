<?php
session_start();
if (isset($_SESSION['emailuser'])) {
    header('Location: dashboard.php');
    die("Redirecting..");
}
include '../../model/db.php'; 

$fname = $femail = $fpass = $fpassc = $fphonenum = $fbname = $fstoretype = $fyb = $fbusadd = $fcategory = "";
$fimage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isFormComplete = true;

    if (empty($_POST["full_name"])) {
        $fname = "Please fill in your full name";
        $isFormComplete = false;
    } else {
        if (!ctype_alpha(str_replace(' ', '', $_POST["full_name"]))) {
            $fname = "Name must contain only letters and spaces";
            $isFormComplete = false;
        }
    }

    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $femail = "Please enter a valid email";
        $isFormComplete = false;
    }

    if (empty($_POST["password"])) {
        $fpass = "Please enter a password";
        $isFormComplete = false;
    }

    if (empty($_POST["confirm_password"])) {
        $fpassc = "Please confirm your password";
        $isFormComplete = false;
    }

    if (!empty($_POST["password"]) && !empty($_POST["confirm_password"]) && ($_POST["password"] !== $_POST["confirm_password"])) {
        $fpassc = "Passwords do not match";
        $isFormComplete = false;
    }

    if (empty($_POST["phone_number"]) || !ctype_digit($_POST["phone_number"])) {
        $fphonenum = "Please enter a valid phone number (digits only)";
        $isFormComplete = false;
    }

    if (empty($_POST["business_name"])) {
        $fbname = "Please enter your business name";
        $isFormComplete = false;
    }

    if (empty($_POST["store_type"])) {
        $fstoretype = "Please select a store type";
        $isFormComplete = false;
    }

    if (
        (!isset($_POST["categories1"]) || is_null($_POST["categories1"])) &&
        (!isset($_POST["categories2"]) || is_null($_POST["categories2"])) &&
        (!isset($_POST["categories4"]) || is_null($_POST["categories4"]))
    ) {
        $fcategory = "Please select at least one product category";
        $isFormComplete = false;
    }

    if (empty($_POST["years_in_business"]) || !ctype_digit($_POST["years_in_business"])) {
        $fyb = "Please enter valid years in business";
        $isFormComplete = false;
    }

    if (empty($_POST["business_address"])) {
        $fbusadd = "Please enter your business address";
        $isFormComplete = false;
    }

    $image_path = "";
    if ($_FILES['myfile']['type'] == 'image/jpeg' || $_FILES['myfile']['type'] == 'image/png') {
        $ext = $_FILES['myfile']['type'] == 'image/png' ? '.png' : '.jpg';
        $image_path = "../../images/" . $_POST['email'] . $ext;
        move_uploaded_file($_FILES['myfile']['tmp_name'], $image_path);
    } else {
        $fimage = "Only JPG and PNG files are allowed.";
        $isFormComplete = false;
    }

    if ($isFormComplete) {
        $conn = connectDatabase();

        $full_name = $_POST["full_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $phone_number = $_POST["phone_number"];
        $business_name = $_POST["business_name"];
        $store_type = $_POST["store_type"];
        $years_in_business = $_POST["years_in_business"];
        $business_address = $_POST["business_address"];

        $categories = [];
        if (isset($_POST["categories1"])) $categories[] = $_POST["categories1"];
        if (isset($_POST["categories2"])) $categories[] = $_POST["categories2"];
        if (isset($_POST["categories4"])) $categories[] = $_POST["categories4"];
        $category = implode(", ", $categories);

        $inserted = insertData($conn, $full_name, $email, $password, $phone_number, $business_name, $store_type, $years_in_business, $business_address, $category, $image_path);

        if ($inserted) {
            echo "<h2>Form submitted successfully!</h2>";
            echo "Thank you for registering.";
            $_SESSION["emailuser"]=$email;
            header("Location: dashboard.php");
            die();
        } else {
            echo "<h2>Error inserting data:</h2> " . $conn->error;
        }

        closeDatabase($conn);
    }
}
?>
