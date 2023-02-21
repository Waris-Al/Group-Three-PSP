<?php
include 'phpqrcode/qrlib.php';
require('fpdf/multicellmax.php');

function getQNos()
{
  $db = new SQLite3('ActionPoints.db');
  $stmt = $db->prepare("SELECT * FROM Checklist WHERE QuestionNo LIKE 'Q%' ORDER BY CAST(SUBSTR(QuestionNo, 2) AS UNSIGNED) DESC LIMIT 1");
  $result = $stmt->execute();
  
  $arrayResult = [];
  while ($row = $result->fetchArray())
  {
      $arrayResult [] = $row;
  }
  return $arrayResult;
}
$NumberOfQs = substr((getQNos())[0]['QuestionNo'], 1);


$pointsToImprove = "Action Points \n";
$goodPoints = "";
$NumberOfImprovemenets = 0;
$totalQuestions = $_GET['totalQuestions'];
$db = new SQLite3('ActionPoints.db');
for ($i=1; $i <= $NumberOfQs; $i++)
{
$QuestionInDB = "Q" . strval($i);
if (isset($_GET["$QuestionInDB"]) && $_GET["$QuestionInDB"]=="no")
{
$NumberOfImprovemenets++;
  $stmt = $db->prepare("SELECT ActionPoint FROM Checklist WHERE QuestionNo = '$QuestionInDB'");
  $result = $stmt->execute();


  $rows_array = [];
  while ($row=$result->fetchArray())
  {
      $rows_array[]=$row;
  }

  foreach ($rows_array as $value)
{
    $pointsToImprove.= "-" . $value['ActionPoint'] . "\n";
}
}
else if (isset($_GET["$QuestionInDB"]))
{
  $stmt = $db->prepare("SELECT GoodPoint FROM Checklist WHERE QuestionNo = '$QuestionInDB'");
  $result = $stmt->execute();

    $rows_array = [];
  while ($row=$result->fetchArray())
  {
      $rows_array[]=$row;
  }

  foreach ($rows_array as $value)
{
    $goodPoints.= "-" . $value['GoodPoint'] . "\n";
}
//make this its own function that gets called in the else statement
//then when you go through the results adding all the info to its own table
}

}

$totalPercent = (100-($NumberOfImprovemenets/$totalQuestions)*100);
$totalPercent = round($totalPercent, 1);
$pointsToImprove .= "\nGood points \n $goodPoints";
$pointsToImprove .= "\nYour overall Accessibility Score is $totalPercent %";
$report = $_GET['company'] . ".pdf";
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Write(5, $pointsToImprove); // Use Write() instead of MultiCell() and set a height of 5
$pdf->Ln(); // Add a blank line


$qr_text = 'https://docs.google.com/document/d/1YOHMRAphILRjlTk7r0Getu9h2yKg3Rwp-D9OjCmFpRI/edit'; // change this to the text you want to encode in the QR code
$qr_file = 'qr.png'; // specify the filename for the QR code image
$pdf->Image($qr_file);


$pdf->Output();
$pdf->Output('F', $report);


echo "\nYour overall Accessibility Score is $totalPercent %";
  /*
  //C:\xampp\htdocs\Group-Three-PSP-
  */
?>
  