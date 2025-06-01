<?php
setcookie("user","1",time()+86400);
if(isset($_COOKIE["user"])){
    echo "Welcome Back";    
}
else{
    echo "Hello!";
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Seller Registration</title>
    <link rel="stylesheet" href="../../style/sellerformstyle.css">
    <?php
        include "../../control/actionpage.php";
        $_SESSION["favcolor"]="yellow";
        //print_r($_SESSION);
    ?>
</head>
<body>
    
    <div class="boxdiv">
        <h2>Seller Registration Form</h2>
        <form method="post" id="sellerForm" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="full_name">Full Name:</label></td>
                    <td>
                        <input id="full_name" name="full_name" >
                        <span class="error"><?php echo $fname; ?>
                        <p id="nameError" class="error"></p>

                    </td>
                </tr>
                <tr>
                     <td><label for="email">Email:</label></td>
                    <td>
                        <input id="email" name="email" >
                        <span class="error"><?php echo $femail; ?>
                        <p id="emailError" class="error"></p>

                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td>
                        <input type="password" id="password" name="password" >
                        <span class="error"><?php echo $fpass; ?>
                                                <p id="passwordError" class="error"></p>

                    </td>
                </tr>
                <tr>
                    <td><label for="confirm_password">Confirm Password:</label></td>
                    <td>
                        <input type="password" id="confirm_password" name="confirm_password" >
                        <span class="confirmPasswordError" class="error">
                    </td>
                </tr>
                <tr>
                    <td><label for="phone_number">Phone Number:</label></td>
                    <td>
                        <input id="phone_number" name="phone_number">
                        <span class="error"><?php echo $fphonenum; ?>
                        <p id="phoneError" class="error"></p>
                    </td>
                </tr>
                <tr>
                    <td><label for="business_name">Business Name:</label></td>
                    <td>
                        <input id="business_name" name="business_name" >
                        <span class="error"><?php echo $fbname; ?>
                        <p id="businessError" class="error"></p>


                    </td>
                </tr>
                <tr>
                    <td><label for="store_type">Store Type:</label></td>
                    <td>
                        <select id="store_type" name="store_type" >
                            <option value="">Select Store Type</option>
                            <option value="Physical">Physical</option>
                            <option value="Online">Online</option>
                            <option value="Both">Both</option>
                        </select>
                        <p id="storeError" class="error"></p>
                        <span class="error"><?php echo $fstoretype; ?>

                    </td>
                </tr>
                    <tr>
                        <td>Product Categories:</td>
                        <td>
                            <input type="checkbox" id="laptops" name="categories1" value="Laptops">
                            <label for="laptops">Laptops</label>
                            <input type="checkbox" id="smartphones" name="categories2" value="Smartphones">
                            <label for="smartphones">Smartphones</label>
                            <input type="checkbox" id="cameras" name="categories4" value="Cameras">
                            <label for="cameras">Cameras</label>
                            <span class="error"><?php echo $fcategory; ?></span>
                        </td>
                    </tr>

                <tr>
                    <td><label for="years_in_business">Years in Business:</label></td>
                    <td>
                        <input type="number" id="years_in_business" name="years_in_business" min="0" >
                        <p id="yearsError" class="error"></p>
                        <span class="error"><?php echo $fyb; ?>

                    </td>
                </tr>
                <tr>
                    <td><label for="business_address">Business Address:</label></td>
                    <td>
                        <textarea id="business_address" name="business_address" ></textarea>
                        <p id="addressError" class="error"></p>
                        <span class="error"><?php echo $fbusadd; ?>

                    </td>
                </tr>
                <tr>
                <td>
                    <td>
                    <input type="file" name="myfile" id="profile_picture">
                    <span class="error"><?php echo $fimage; ?></span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" value="Register" class="submit-btn">
                    </td>
                </tr>
            </table>
        </form>
        </div>

    <!-- <script src="../../scripts/sellerform.js"></script> -->
</body>
</html>


<!-- 
GET
POST
REQUEST
SERVER
 -->