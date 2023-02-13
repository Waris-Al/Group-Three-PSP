<?php
$db = new SQLite3('C:\xampp\htdocs\Group-Three-PSP\ActionPoints.db');
for ($i=0; $i < 10; $i++)
{
$task = "task-";
$testString = $task . strval($i);
if ($_GET["$testString"]=="no")
{
  $stmt = $db->prepare("SELECT ActionPoint FROM Action WHERE taskNo = '$testString'");
  $result = $stmt->execute();


  $rows_array = [];
  while ($row=$result->fetchArray())
  {
      $rows_array[]=$row;
  }

  foreach ($rows_array as $value)
{
    echo $value['ActionPoint'] . "<br>";
}
  
}
}
  /*
  <?php 
 function verifyCustomer () {


    $db = new SQLite3('C:\xampp\Data\customer.db');
    $stmt = $db->prepare('SELECT applicationID, PC, lastName FROM customer WHERE applicationID=:ID AND PC=:loginpc AND lastName=:surname');
    $stmt->bindParam(':ID', $_POST['ID'], SQLITE3_TEXT);
    $stmt->bindParam(':loginpc', $_POST['loginpc'], SQLITE3_TEXT);
    $stmt->bindParam(':surname', $_POST['surname'], SQLITE3_TEXT);

    $result = $stmt->execute();

    $rows_array = [];
    while ($row=$result->fetchArray())
    {
        $rows_array[]=$row;
    }
    return $rows_array;
}
?>
  //C:\xampp\htdocs\Group-Three-PSP
  */
?>
  