<?php
    $conn = mysqli_connect("localhost","root","","intership");

    if(!$conn)
    {
        die("Connection Failed");
    }

    include("phpqrcode/qrlib.php");

    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    $sql = "INSERT INTO students(name,email,contact) VALUES('$name','$email','$contact')";

    mysqli_query($conn,$sql);

    $data = "Name : ".$name."\nEmail : ".$email."\nContact : ".$contact;

    $filename = "qrcodes/".$name.".png";

    QRcode::png($data,$filename);

?>

<!DOCTYPE html>
<html>
<head>
    <title>QR Generated</title>
</head>
<style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:Arial,sans-serif;
    }

    body{
        background:#f4f6f9;
        min-height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
    }

    .card{
        width:450px;
        background:white;
        padding:30px;
        border-radius:15px;
        box-shadow:0 10px 25px rgba(0,0,0,0.15);
        text-align:center;
    }

    h2{
        color:green;
        margin-bottom:20px;
    }

    p{
        margin:10px 0;
        font-size:16px;
    }

    img{
        margin-top:20px;
        width:220px;
        border:5px solid #eee;
        border-radius:10px;
    }

    </style>
<body>

<div class="card">
    <h2>Student Saved Successfully</h2>

    <h3>Generated QR Code</h3>

    <img src="<?php echo $filename; ?>">

</div>
</body>
</html>
