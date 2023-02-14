<?php include("NavigationBar.php"); ?>

<?php 
function getQs()
{
  $db = new SQLite3('C:\xampp\htdocs\Group-Three-PSP\ActionPoints.db');
  $stmt = $db->prepare('SELECT QuestionNo FROM Checklist ORDER BY QuestionNo DESC LIMIT 1');
  $result = $stmt->execute();
  
  $arrayResult = [];//prepare an empty array first
  while ($row = $result->fetchArray()){ // use fetchArray(SQLITE3_NUM) - another approach
      $arrayResult [] = $row; //adding a record until end of records
  }
  return $arrayResult;
}
?>




<body class="bgColor">
<form method="get" action="update.php">
<div class="row">
            <div class="col-10">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <td>Question</td>
                        <td></td>
                    </thead>
                    <?php

                    $user = (getQs());
                        for ($i=0; $i<count($user); $i++):

                    ?>

                    <tr>
                    
                        <td><?php echo '"' . $user[$i]['QuestionNo'] . '"'?></td>
                    </tr>
                    <?php endfor;?>
                </table>    
            </div>
        </div>
                        </form>
</body>

<?php require("Footer.php");?>