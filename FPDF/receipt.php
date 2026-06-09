<?php
require('fpdf/fpdf19/fpdf.php');

$conn = mysqli_connect("localhost","root","","intership");

$pdf = new FPDF('P','mm','A4');

$pdf->Addpage();

$pdf->Setfont('Arial','B',16);
$pdf->Cell(0,10,'- Student Fee list -',0,1,'C');
$pdf->Ln(4);

$pdf->Setfont('Arial','B',6);
$pdf->SetFillColor(200,220,255);
$pdf->Cell(12,7,'Receipt No',1,0,'C',true);
$pdf->Cell(12,7,'Date',1,0,'C',true);
$pdf->Cell(22,7,'Stud ID',1,0,'C',true);
$pdf->Cell(50,7,'Student Name',1,0,'C',true);
$pdf->Cell(12,7,'Code',1,0,'C',true);
$pdf->Cell(40,7,'Course Name',1,0,'C',true);
$pdf->Cell(10,7,'Amount',1,0,'C',true);
$pdf->Cell(30,7,'Payment Method',1,0,'C',true);
$pdf->Ln();

$sql = "select * from receipt order by amt DESC";
$result = mysqli_query($conn,$sql);
$i=0;

while($row= mysqli_fetch_assoc($result)){
    $i++;
    if($i % 2 == 0){
        $pdf->SetFillColor(230, 230, 230); 
        
    } else {
         $pdf->SetFillColor(255, 255, 255);
    }

    $pdf->Cell(12,7,$row['rno'],1,0,'C',true);
    $pdf->Cell(12,7,$row['rdate'],1,0,'C',true);
    $pdf->Cell(22,7,$row['stud_id'],1,0,'C',true);
    $pdf->Cell(50,7,$row['stud_nm'],1,0,'C',true);
    $pdf->Cell(12,7,$row['ccode'],1,0,'C',true);
    $pdf->Cell(40,7,$row['cname'],1,0,'C',true);
    $pdf->Cell(10,7,$row['amt'],1,0,'C',true);
    $pdf->Cell(30,7,$row['pay_method'],1,0,'C',true);

    $pdf->Ln();

}


$pdf->Output();

// 2026001
?>
