<?php include("NavigationBar.php"); 
function getQs()
{
  $db = new SQLite3('C:\xampp\htdocs\Group-Three-PSP\ActionPoints.db');
  $stmt = $db->prepare('SELECT * FROM Checklist');
  $result = $stmt->execute();
  
  $arrayResult = [];//prepare an empty array first
  while ($row = $result->fetchArray()){ // use fetchArray(SQLITE3_NUM) - another approach
      $arrayResult [] = $row; //adding a record until end of records
  }
  return $arrayResult;
}
?>
<head>

<form action="AddQ.php">
<button type="submit" name="Add">Add</button>
</form>

<body class="bgColor">
<form method="get" action="update.php">
<div class="row">
            <div class="col-10">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <td>Question Number</td>
                        <td>Question</td>
                        <td>Action Point</td>
                        <td></td>
                    </thead>
                    <?php

                    $user = (getQs());
                        for ($i=0; $i<count($user); $i++):

                    ?>

                    <tr>
                    
                        <td><?php echo $user[$i]['QuestionNo']?></td>
                        <td><?php echo '"' . $user[$i]['Question'] . '"'?></td>
                        <td><?php echo $user[$i]['ActionPoint']?></td>
                        <td>
                            <input type="hidden" name="questionNo" value="<?php echo $user[$i]['QuestionNo']?>">
                            <button type="submit" name="update">Update</button>
                        </td>
                    </tr>
                    <?php endfor;?>
                </table>    
            </div>
        </div>
                        </form>
</body>

                        


<?php
    include("footer.php"); 
?>