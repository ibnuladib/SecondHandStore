<?php
session_start();
setcookie("cooki",1, time()+86400 );
if(!isset($_COOKIE["cooki"])){
    $cookie = "Welcome to my site";
}
else{
    $cookie = "Welcome back";
}
?>
<html>
<head>    
    <title>2ndStore</title>
    <link rel="stylesheet" type="text/css" href="../css/mystylesheet.css">
    <?php
    include "../control/process.php";
    //include "../model/DB.php";
    ?>
</head>
<body>
<!-- <form action="/IshmamXamp/Webtech/Project/view/actionpage.php" id ="onSubmit" method="post"> -->
<form action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="onSubmit" method="post" enctype="multipart/form-data">



<h1>2ndStore</h1>
<p id="motto">Good for the Planet, Great for You.</p>
<div class="firstdiv">
<h2>Register</h2>
<div class="field">
<fieldset>
<legend>User Information</legend>
<table>
    <tr>
        <td><label for="fname">First Name: </label></td>
        <td>
            <input type="text" id="fname" name="fname" placeholder="John">
            <span class="error"> <?php echo $fnameErr; ?></span><br>
        </td>
    </tr>
    <tr>
        <td><label for="lname">Last Name: </label></td>
        <td>
            <input type="text" id="lname" name="lname" placeholder="Doe">
            <span class="error"> <?php echo $lnameErr; ?></span><br>
        </td>
    </tr>
    <tr>
        <td><label for="usrname">Username: </label></td>
        <td>
            <input type="text" id="usrname" name="usrname" placeholder="John123">
            <span class="error"> <?php echo $usrnErr; ?></span><br>
        </td>
    </tr>
    <tr>
        <td><label for="pass">Password: </label></td>
        <td>
            <input type="password" id="pass" name="pass" placeholder="**************">
            <span class="error"> <?php echo $passErr; ?></span><br>
        </td>
    </tr>
    <tr>
        <td><label for="confirmpass">Confirm Password: </label></td>
        <td>
            <input type="password" id="confirmpass" name="confirmpass" placeholder="**************">
            <span class="error"> <?php echo $confpassErr; ?></span><br>
        </td>
    </tr>
    <tr>
        <td><label for="email">Email: </label></td>
        <td>
            <input type="text" id="email" name="email" placeholder="email@example.com">
            <span class="error"> <?php echo $emailErr; ?></span><br>
        </td>
    </tr>
    <tr>
        <td><label for="Phone">Phone: </label></td>
        <td>
            <input type="text" id="Phone" name="phnum" placeholder="123-456-7890">
            <span class="error"> <?php echo $phErr; ?></span><br>
        </td>
    </tr>
    <tr>
        <td><label for="DOB">Date of Birth: </label></td>
        <td>
            <input type="date" id="DOB" name="DOB">
            <span class="error"> <?php echo $DOBErr; ?></span><br>
        </td>
    </tr>
    <tr>
        <td><label id="gdr" name="gdr">Gender: </label></td>
        <td>
            <input type="radio" class="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>
            <input type="radio" class="radio" id="female" name="gender" value="female">
            <label for="female">Female</label>
            <input type="radio" class="radio" id="other" name="gender" value="other">
            <label for="other">Other</label>
            <span class="error"> <?php echo $gdrErr; ?></span>
        </td>
    </tr>
    <tr>
        <td>Profile Picture:</td>
        <td><input type="file" name="myfile"></td>
    </tr>
    <tr>
      
        <td style="text-align:right;"><input id="button" type="submit"><br></td>
        <td style="text-align:left;">
        <button id="button2" type="button" onclick="window.location.href='login.php'">Already have an account?</button>
    </td>
    </tr>
</table>
<?php

echo $cookie;
echo $output;
echo $fileupdate;
echo $targetpath;











?>
</fieldset>
</div>
</div>
</form>
<!-- <script src = ../js/logic.js></script> -->
</body>
</html>
