<?php
$conn = mysqli_connect("localhost","root","","intership");

$mode = $_GET['mode'];

$sql ="SELECT * FROM internship WHERE mode='$mode'";

$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result))
{
    echo "<tr>";

    echo "<td>".$row['stud_name']."</td>";

    echo "<td>".$row['email']."</td>";

    echo "<td>".$row['contact']."</td>";

    echo "<td>".$row['mode']."</td>";

    echo "</tr>";
}



?>
