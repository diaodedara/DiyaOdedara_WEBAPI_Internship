<?php

$conn = mysqli_connect("localhost","root","","intership");

if(!$conn)
{
    die("Connection Failed");
}

$sql = "SELECT * FROM employee";
$result = mysqli_query($conn,$sql);

$xml = new DOMDocument("1.0","UTF-8");
$xml->formatOutput = true;

$employees = $xml->createElement("employees");
$xml->appendChild($employees);

while($row = mysqli_fetch_assoc($result))
{
    $employee = $xml->createElement("employee");

    $employee->appendChild(
        $xml->createElement("eid",$row["eid"])
    );

    $employee->appendChild(
        $xml->createElement("ename",$row["ename"])
    );

    $employee->appendChild(
        $xml->createElement("department",$row["department"])
    );

    $employee->appendChild(
        $xml->createElement("salary",$row["salary"])
    );

    $employees->appendChild($employee);
}

$xml->save("employees.xml");

?>
<!DOCTYPE html>
<html>
<head>
    <title>XML Export</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI',sans-serif;
        }

        body{
            background:#f4f6f9;
            padding:40px;
        }

        .card{
            max-width:800px;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }

        h1{
            text-align:center;
            color:#333;
            margin-bottom:20px;
        }

        .success{
            background:#d4edda;
            color:#155724;
            padding:15px;
            border-radius:8px;
            text-align:center;
            font-weight:bold;
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th{
            background:#4f46e5;
            color:white;
            padding:12px;
        }

        td{
            padding:12px;
            text-align:center;
            border-bottom:1px solid #ddd;
        }

        tr:hover{
            background:#f1f1f1;
        }
    </style>
</head>
<body>

<div class="card">

    <h1>Database to XML Export</h1>

    <div class="success">
        employees.xml File Created Successfully
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Salary</th>
        </tr>

        <?php
        mysqli_data_seek($result,0);

        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>
                    <td>{$row['eid']}</td>
                    <td>{$row['ename']}</td>
                    <td>{$row['department']}</td>
                    <td>{$row['salary']}</td>
                  </tr>";
        }
        ?>
    </table>

</div>

</body>
</html>