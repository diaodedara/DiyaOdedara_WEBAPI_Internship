<?php
$name = $email = $contact = "";
$nameErr = $emailErr = $contactErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["name"]))
    {
        $nameErr = "Name is required";
    }
    else
    {
        $name = trim($_POST["name"]);

        if(!preg_match("/^[a-zA-Z ]+$/",$name))
        {
            $nameErr = "Invalid Name";
        }
    }

    if(empty($_POST["email"]))
    {
        $emailErr = "Email is required";
    }
    else
    {
        $email = trim($_POST["email"]);

        if(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",$email))
        {
            $emailErr = "Invalid Email";
        }
    }

    if(empty($_POST["contact"]))
    {
        $contactErr = "Contact is required";
    }
    else
    {
        $contact = trim($_POST["contact"]);

        if(!preg_match("/^[0-9]{10}$/",$contact))
        {
            $contactErr = "Contact must be 10 digits";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Implementation</title>
    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            background:linear-gradient(135deg,#667eea,#764ba2);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .container{
            width:400px;
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
        }

        h2{
            text-align:center;
            margin-bottom:20px;
            color:#333;
        }

        input{
            width:100%;
            padding:12px;
            margin-top:8px;
            margin-bottom:15px;
            border:1px solid #ccc;
            border-radius:8px;
        }

        button{
            width:100%;
            padding:12px;
            border:none;
            background:#667eea;
            color:white;
            font-size:16px;
            border-radius:8px;
            cursor:pointer;
        }

        button:hover{
            background:#5563d6;
        }
    </style>
</head>
<body>
<div class="container">
    <h2> Student QR Code Generator</h2>

    <form action="save.php" method="post">
        <label></label>
        <input type="text" name="name" placeholder="Enter your name"><br><br>
        <label><input type="text" name="email" placeholder="Enter your email"></label><br><br>
        <label><input type="text" name="contact" placeholder="Enter your contact"></label><br><br>
        <button type="submit">Generate QR Code</button>
    </form>

</div>
</body>
</html>