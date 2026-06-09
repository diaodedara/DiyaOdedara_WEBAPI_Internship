<?php
$firstname = $lastname = $middlename = $email = $contact = $aadhar = $pan = $gender = $city = $password = $username = $password = $confirm_password = $success = "";;
$firstnameErr = $lastnameErr = $middlenameErr  = $genderErr = $aadharErr= $cityErr = $emailErr = $contactErr = $panErr = $usernameErr = $passwordErr = $confirm_passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $valid = true;

    // Name Validation
    if (empty($_POST["firstname"])) {
        $firstnameErr = "Name is required";
        $valid = false;
    } else {
        $firstname = trim($_POST["firstname"]);

        if (!preg_match("/^[a-zA-Z ]+$/", $firstname)) {
            $firstnameErr = "invalid first name!";
            $valid = false;
        }
    }

    if (empty($_POST["middlename"])) {
        $middlenameErr = "Name is required";
        $valid = false;
    } else {
        $middlename = trim($_POST["middlename"]);

        if (!preg_match("/^[a-zA-Z ]+$/", $middlename)) {
            $middlenameErr = "invalid middle name!";
            $valid = false;
        }
    }

    if (empty($_POST["lastname"])) {
        $lastnameErr = "Name is required";
        $valid = false;
    } else {
        $lastname = trim($_POST["lastname"]);

        if (!preg_match("/^[a-zA-Z ]+$/", $lastname)) {
            $lastnameErr = "invalid last name! ";
            $valid = false;
        }
    }

    if (empty($_POST["contact"])) {
        $contactErr = "phone no is required";
        $valid = false;
    } else {
        $contact = trim($_POST["contact"]);

        if (!preg_match("/^[6-9]\d{9}$/", $contact)) {
            $contactErr = "Invalid phone number ";
            $valid = false;
        }
    }

    if(empty($_POST['email'])){
        $emailErr = "email is required";
        $valid= false;
    }else{
        $email= trim($_POST["email"]);

        if(!preg_match("/^[\w\.-]+@[\w\.-]+\.\w+$/",$email)){
            $emailErr= "invalid email";
            $valid=false;
        }
    }

    if(empty($_POST["aadhar"])){
        $aadharErr = "aadhar number is required";
        $valid=false;
    }else{
        $aadhar= $_POST["aadhar"];

        if(!preg_match("/^[0-9]{12}$/",$aadhar)){
            $aadharErr = "Invalid Aadhaar Number";
            $valid= false;
        }   
    }

    if (empty($_POST["gender"])) { 
        $genderErr = "Select Gender"; 
        $valid = false; 

    } else { 
        $gender = $_POST["gender"]; 
    }

    if (empty($_POST["city"])) {
        $cityErr = "City is required"; 
        $valid = false; 
    } else { 
        $city = trim($_POST["city"]); 

        if (!preg_match("/^[a-zA-Z ]+$/", $city)) { 
            $cityErr = "Only letters allowed"; 
            $valid = false; 
        } 
    }

    if(empty($_POST["pan"])){
        $panErr = "PAN number is required!";
        $valid=false;
    }else{
        $pan= trim($_POST["pan"]);

        if(!preg_match("/^[A-Z]{5}[0-9]{4}[A-Z]$/",$pan)){
            $panErr = "Invalid PAN Number!";
            $valid= false;
        }   
    }

    if (empty($_POST["username"])) { 
        $usernameErr = "Username is required!"; 
        $valid = false; 

    } else { 
        $username = trim($_POST["username"]);

         if (!preg_match("/^[a-zA-Z0-9_]{5,15}$/", $username)) {
            $usernameErr = "invalid Username!"; 
            $valid = false; 
        }
    }

    if (empty($_POST["password"])) { 
        $passwordErr = "Password is required"; 
        $valid = false; 
    } else { 
        $password = trim($_POST["password"]); 

        if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/", $password)) {
            $passwordErr = "Strong password required"; 
            $valid = false; 
        }
    }

    if (empty($_POST["confirm_password"])) {
        $confirmErr = "Confirm Password required"; 
        $valid = false; 
    } else { 
        $confirm_password = trim($_POST["confirm_password"]);

        if ($password != $confirm_password) { 
            $confirmErr = "Passwords do not match"; 
            $valid = false; 
        } 
    }
    if ($valid) { 
        $success = "Registration Successful!"; 
    } 


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="regexstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    
</head>
<body>
    <div class="container">

    <h2>Registration Form</h2>

    <form method="post">

        
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>">
            <span class="error"><?php echo $firstnameErr; ?></span>
        </div>

        
        <div class="form-group">
            <label>Middle Name</label>
            <input type="text" name="middlename" value="<?php echo htmlspecialchars($middlename); ?>">
            <span class="error"><?php echo $middlenameErr; ?></span>
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lastname"  value="<?php echo htmlspecialchars($lastname); ?>">
            <span class="error"><?php echo $lastnameErr; ?></span>
        </div>

      
        <div class="form-group">
            <label>City</label>
            <input type="text" name="city"
                   value="<?php echo htmlspecialchars($city); ?>">
            <span class="error"><?php echo $cityErr; ?></span>
        </div>


        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <span class="error"><?php echo $emailErr; ?></span>
        </div>

        
        <div class="form-group">
            <label>Contact</label>
            <input type="text" name="contact" maxlength="10" value="<?php echo htmlspecialchars($contact); ?>">
            <span class="error"><?php echo $contactErr; ?></span>
        </div>

        
        <div class=" gender-row">
            <label>Gender</label>

            <div class="gender-box">
                <input type="radio" name="gender" value="Male"> Male
                <input type="radio" name="gender" value="Female"> Female
            </div>
            <span class="error"><?php echo $genderErr; ?></span>
        </div>

    
        <div class="form-group">
            <label>Aadhaar Number</label>
            <input type="text" name="aadhar" maxlength="12" value="<?php echo htmlspecialchars($aadhar); ?>">
            <span class="error"><?php echo $aadharErr; ?></span>
        </div>


        <div class="form-group">
            <label>PAN Number</label>
            <input type="text" name="pan" maxlength="10" style="text-transform:uppercase;" value="<?php echo htmlspecialchars($pan); ?>">
            <span class="error"><?php echo $panErr; ?></span>
        </div>

        
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">
            <span class="error"><?php echo $usernameErr; ?></span>
        </div>

    
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password">
            <span class="error"><?php echo $passwordErr; ?></span>
        </div>

        
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password">
            <span class="error"><?php echo $confirm_passwordErr; ?></span>
        </div>

        <div class="button-row">

            <input type="submit"
                value="Register"
                class="btn">

        </div>

    </form>

    <div class="success">
        <?php echo $success; ?>
    </div>

</div>


</body>
</html>
