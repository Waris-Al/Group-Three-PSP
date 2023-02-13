<?php
$totalNos = 0;
$totalQuestions = $_GET['totalQuestions'];
$db = new SQLite3('C:\xampp\htdocs\Group-Three-PSP\ActionPoints.db');
for ($i=0; $i < $totalQuestions; $i++)
{
$task = "task-";
$testString = $task . strval($i);
if ($_GET["$testString"]=="no")
{
$totalNos++;
  $stmt = $db->prepare("SELECT ActionPoint FROM Action WHERE taskNo = '$testString'");
  $result = $stmt->execute();


  $rows_array = [];
  while ($row=$result->fetchArray())
  {
      $rows_array[]=$row;
  }

  foreach ($rows_array as $value)
{
    echo "•" . $value['ActionPoint'] . "<br>";
}
  
}
}

$totalPercent = (100-($totalNos/$totalQuestions)*100);
$totalPercent = round($totalPercent, 1);
echo "Your overall Accessibility Score is $totalPercent %";
  /*
  //C:\xampp\htdocs\Group-Three-PSP
  */
?>
  