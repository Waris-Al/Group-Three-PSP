<?php include("NavigationBar.php"); 
function getQs()
{
    $db = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");

  $stmt = $db->prepare('SELECT * FROM Checklist ORDER BY CAST(SUBSTRING(QuestionNo, 2, 5) AS INTEGER) ASC;');
  $result = $stmt->execute();
  $arrayResult = [];
  $rows = $stmt->fetchAll();
  foreach ($rows as $row) {
      $arrayResult[] = $row;
  }
  return $arrayResult;
}
?>
<head>

<form action="AddQ.php">
<button type="submit" name="Add">Add</button>
</form>


<body class="bgColor">
<div class="row">
            <div class="col-10">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <td>Question Number</td>
                        <td>Question</td>
                        <td>Action Point</td>
                        <td>Venue</td>
                        <td>Good Point</td>
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
                        <td><?php echo $user[$i]['Venue']?></td>
                        <td><?php echo $user[$i]['GoodPoint']?></td>
                        <td>
                            <form action="update.php?questionNo=<?php echo $user[$i]['QuestionNo']?>" method=get>
                            <input type="hidden" name="questionNo" value="<?php echo $user[$i]['QuestionNo']?>">
                            <button type="submit" name="update">Update</button>
                        </form>
                        </td>
                    </tr>
                    <?php endfor;?>
                </table>    
            </div>
        </div>
</body>

                        


<?php
    include("footer.php"); 
?>