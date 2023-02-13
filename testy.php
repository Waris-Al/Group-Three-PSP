<?php
require('fpdf/multicellmax.php');

$pdf=new PDF();
$pdf->AddPage();
$txt='';
for ($i=1; $i<19; $i++)
    $txt.="all work and no play makes jack a dull boy \n";
$pdf->SetFont('Arial','',10);
$txt=$pdf->MultiCell(100,5,$txt,0,'J',0,4);
$pdf->Output();
?>