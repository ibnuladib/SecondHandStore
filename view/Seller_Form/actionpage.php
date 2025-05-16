<?php

$fname = $femail = $fpass = $fpassc = $fphonenum = $fbname = $fstoretype = $fyb = $fbusadd = $fcategory = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isFormComplete = true;

    if (empty($_POST["full_name"])) {
        $fname =  "Please fill in your full name";
        $isFormComplete = false;
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
        empty($_POST["categories1"]) &&
        empty($_POST["categories2"]) &&
        empty($_POST["categories4"])
    ) {
        $fcategory = "Please select at least one product category";
        $isFormComplete = false;
    }

    if (empty($_POST["years_in_business"])) {
        $fyb = "Please enter valid years in business";
        $isFormComplete = false;
    }

    if (empty($_POST["business_address"])) {
        $fbusadd = "Please enter your business address";
        $isFormComplete = false;
    }

    if ($isFormComplete) {
        echo "<h2>Form submitted successfully!</h2>";
        echo "Thank you for registering.";
    }
}
?>
