<!DOCTYPE html>
<html>
<head>
    <title>Google reCAPTCHA Demo</title>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI',sans-serif;
        }

        body{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg,#667eea,#764ba2);
        }

        .form-container{
            width:400px;
            background:#fff;
            padding:35px;
            border-radius:20px;
            box-shadow:0 15px 35px rgba(0,0,0,0.2);
        }

        .form-container h2{
            text-align:center;
            margin-bottom:25px;
            color:#333;
        }

        .input-group{
            margin-bottom:18px;
        }

        input{
            width:100%;
            padding:14px;
            border:1px solid #ddd;
            border-radius:10px;
            outline:none;
            font-size:16px;
            transition:0.3s;
        }

        input:focus{
            border-color:#667eea;
            box-shadow:0 0 8px rgba(102,126,234,0.3);
        }

        .g-recaptcha{
            margin:15px 0;
        }

        button{
            width:100%;
            padding:14px;
            border:none;
            border-radius:10px;
            background:linear-gradient(135deg,#667eea,#764ba2);
            color:white;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            transform:translateY(-2px);
        }

        .footer-text{
            text-align:center;
            margin-top:15px;
            color:#777;
            font-size:14px;
        }
</style>
<script>
    function enableBtn(){
        document.getElementById("btn").disabled = false;
    }
</script>
</head>
<body>
<div class="form-container">
    <form method="post" action="save.php">

        <h2>Login Form</h2>

        <div class="input-group">
            <input type="text" name="username" placeholder="Enter Username">
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Enter Password">
        </div>

        <div class="g-recaptcha" data-sitekey="6Lfb6hktAAAAADY1l9S2SC9RkQ3PWB-L7UIDWdGR" data-callback="enableBtn"></div><br>

        <button type="submit" id="btn" disabled="disabled">Login</button>

    </form>
</div>  
</body>
</html>