<?php
$fnameErr = $lnameErr = $usrnErr = $passErr = $confpassErr = $emailErr = $phErr = $DOBErr = $gdrErr = $accountExistsErr = "";
 ;
$fname = $lname = $usrn = $pass = $confpass = $email = $ph = $DOB = $gdr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    


    if (empty($_POST["fname"])) {
        $fnameErr = "First name is required";

    } elseif(is_numeric($_POST["fname"])){
        $fnameErr = "Name cannot contain a number";

    } else {
        $fname = test_input($_POST["fname"]);
    }

    if (empty($_POST["lname"])) {
        $lnameErr = "Last name is required";

    } elseif(is_numeric($_POST["lname"])){
        $lnameErr = "Name cannot contain a number";

    } else {
        $lname = test_input($_POST["lname"]);
    }

    if (empty($_POST["usrname"])) {
        $usrnErr = "Username is required";
    } else {
        $usrn = test_input($_POST["usrname"]);
    }

    if (empty($_POST["pass"])) {
        $passErr = "Password is required";

    } elseif(strlen($_POST["pass"])<8){
        $passErr = "Password must have atleast 8 characters ";

    } else {
        $pass = $_POST["pass"];

        $passHash = password_hash($pass, PASSWORD_DEFAULT);
    }

    if (empty($_POST["confirmpass"])) {
        $confpassErr = "Confirm your password";

    } elseif($_POST["confirmpass"]!=$_POST["pass"]){
        $confpassErr = "Passwords do not match";

    } else {
        $confpass = $_POST["confirmpass"];
        if ($confpass !== $pass) {
            $confpassErr = "Passwords do not match";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";

    } else if(!str_contains($_POST["email"],'@')){
        $emailErr = "Email is invalid";

    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["phnum"])) {
        $phErr = "Phone number is required";

    } else if(strlen($_POST["phnum"])!=11 || is_numeric($_POST["phnum"])==false){

        $phErr = "Phone number not valid";

    } else {
        $ph = test_input($_POST["phnum"]);
    }

    if (empty($_POST["DOB"])) {
        $DOBErr = "Date of birth is required";
    } else {
        $DOB = test_input($_POST["DOB"]);
    }

    if (empty($_POST["gender"])) {
        $gdrErr = "Gender is required";
    } else {
        $gdr = test_input($_POST["gender"]);
    }

    $uploadDirectory = '../uploads/';


    $originalName = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', basename($_FILES['myfile']['name']));

    $extension = strtolower(pathinfo($originalName,PATHINFO_EXTENSION));

    $key = uniqid().'.'.$extension;

    $targetpath = $uploadDirectory .$key ;


    if (move_uploaded_file($_FILES['myfile']['tmp_name'], $targetpath)) {
        $fileupdate = "<p><strong>$originalName</strong> uploaded successfully as <strong>$key</strong></p>";
    } elseif ($_FILES["myfile"]["size"] > 5000000) {
        $fileupdate = "Sorry, your file is too large.";
    }else {
        $fileupdate = $_FILES['myfile']['error'];
    }


}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
// if(!in_array("",[$fname , $lname , $usrn , $pass , $confpass , $email , $ph , $DOB , $gdr])){
// $output = "
// <h2> Input values: </h2>
// <p> First Name:  $fname </p>
// <p> Last Name:  $lname </p>
// <p> Username:  $usrn </p>
// <p> Email: $email </p>
// <p> Phone Number:  $ph </p>
// <p> Date of Birth:  $DOB </p>
// <p> Gender:  $gdr </p>

// ";



require "../model/db.php";
$conn = connect();

$checkSql = "SELECT * FROM ProjecWebtech WHERE usrname = '$usrn' OR email = '$email'";
$result = $conn->query($checkSql);
if ($result->num_rows > 0) {
    $accountExistsErr = "Account with this username or email already exists.";
} else {

$sql = "INSERT INTO ProjecWebtech (fname, lname, usrname, pass, email, phnum, DOB, gender, myfile) VALUES ('$fname', '$lname', '$usrn', '$passHash', '$email', '$ph', '$DOB', '$gdr', '$key')";
$res = $conn ->query($sql);
if ($res) {
    header("Location: ../view/login.php");
exit();
} else {
    echo "Error: " . $conn->error;
}
}
}

?>

