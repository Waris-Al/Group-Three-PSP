<?php
require('fpdf/multicellmax.php');

function getQs()
{
  $db = new SQLite3('C:\xampp\htdocs\Group-Three-PSP\ActionPoints.db');
  $stmt = $db->prepare("SELECT * FROM Checklist WHERE QuestionNo LIKE 'Q%' ORDER BY CAST(SUBSTR(QuestionNo, 2) AS UNSIGNED) DESC LIMIT 1");
  $result = $stmt->execute();
  
  $arrayResult = [];//prepare an empty array first
  while ($row = $result->fetchArray()){ // use fetchArray(SQLITE3_NUM) - another approach
      $arrayResult [] = $row; //adding a record until end of records
  }
  return $arrayResult;
}
$dw = substr((getQs())[0]['QuestionNo'], 1);


$endText = "";
$totalNos = 0;
$totalQuestions = $_GET['totalQuestions'];
$db = new SQLite3('C:\xampp\htdocs\Group-Three-PSP\ActionPoints.db');
for ($i=1; $i <= $dw; $i++)
{
$task = "Q";
$testString = $task . strval($i);
if (isset($_GET["$testString"]) && $_GET["$testString"]=="no")
{
$totalNos++;
  $stmt = $db->prepare("SELECT ActionPoint FROM Checklist WHERE QuestionNo = '$testString'");
  $result = $stmt->execute();


  $rows_array = [];
  while ($row=$result->fetchArray())
  {
      $rows_array[]=$row;
  }

  foreach ($rows_array as $value)
{
    $endText.= "-" . $value['ActionPoint'] . "\n";
}
  
}
}


$totalPercent = (100-($totalNos/$totalQuestions)*100);
$totalPercent = round($totalPercent, 1);

$endText.="\nYour overall Accessibility Score is $totalPercent %";

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$txt=$pdf->MultiCell(100,5,$endText,0,'J',0,$totalQuestions);

$fileName = $totalPercent . ".pdf";
$pdf->Output();
$pdf->Output('F', $fileName);


echo "\nYour overall Accessibility Score is $totalPercent %";
  /*
  //C:\xampp\htdocs\Group-Three-PSP
  */
?>
  