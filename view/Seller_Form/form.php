<!DOCTYPE html>
<head>
<link rel="stylesheet" href="../../style/sellerformstyle.css">
</head>
<body>

   
    
    <div class="boxdiv">
        <h2>Seller Registration Form</h2>
        <form method="post" action="actionpage.php">
            <table>
            <tr>
                <td><label for="full_name">Full Name:</label></td>
                <td><input id="full_name" name="full_name"></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email"></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password"></td>
            </tr>
            <tr>
                <td><label for="confirm_password">Confirm Password:</label></td>
                <td><input type="password" id="confirm_password" name="confirm_password"></td>
            </tr>
            <tr>
                <td><label for="phone_number">Phone Number:</label></td>
                <td><input id="phone_number" name="phone_number"></td>
            </tr>
            <tr>
                <td><label for="business_name">Business Name:</label></td>
                <td><input id="business_name" name="business_name"></td>
            </tr>
            <tr>
                <td><label for="store_type">Store Type:</label></td>
                <td>
                    <select id="store_type" name="store_type">
                        <option value="">Select Store Type</option>
                        <option value="Physical">Physical</option>
                        <option value="Online">Online</option>
                        <option value="Both">Both</option>
                    </select>
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
                </td>
            </tr>
            <tr>
                <td><label for="years_in_business">Years in Business:</label></td>
                <td><input type="number" id="years_in_business" name="years_in_business"></td>
            </tr>
            <tr>
                <td><label for="business_address">Business Address:</label></td>
                <td><textarea id="business_address" name="business_address"></textarea></td>
            </tr>
            <tr>
                <td>
                <input type="submit" value="Register" class="submit-btn">
                </td>
            </tr>
        </table>
    </form>
    </div>    
</body>
</html>
