<?php

$conn = mysqli_connect("localhost","root","","intership");

if(!$conn)
{
    die("Connection Failed");
}

// Load XML File
$xml = simplexml_load_file("employee.xml");

// Read XML Data
foreach($xml->employee as $employee)
{
    $eid = $employee->eid;
    $ename = $employee->ename;
    $department = $employee->department;
    $salary = $employee->salary;

    $sql = "INSERT INTO employee(eid,ename,department,salary)VALUES('$eid','$ename','$department','$salary')";
    mysqli_query($conn,$sql);
}

echo "Employee Records Imported Successfully";

mysqli_close($conn);

?>