<?php 
include("NavigationBar.php");
function getInfo()
{
$questionNo = $_GET['questionNo'];

    
  $db = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");

    $stmt = $db->prepare("SELECT * FROM Checklist WHERE QuestionNo = '$questionNo'");
    $result = $stmt->execute();
    
  $arrayResult = [];
  $rows = $stmt->fetchAll();
  foreach ($rows as $row) {
      $arrayResult[] = $row;
  }
  return $arrayResult;
}
$nameErr = $invalidMesg = "";
/*UPDATE Checklist
SET Question = 'Testing testing 123'
WHERE Question = "Testing this at home"; */
if (isset($_POST['submit'])) {

    if ($_POST['username']=="" && $_POST['updating'] != "Delete") {
        $nameErr = "Enter the Question";
      } 

    if($_POST['username'] != null && $_POST['updating'] != "Delete")
    {
        $questionNo = $_GET['questionNo'];
        $updater = $_POST['username'];
        $col = $_POST['updating'];
        
  $db = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");
  
        $stmt = $db->prepare("UPDATE Checklist SET $col = '$updater' WHERE QuestionNo = '$questionNo'");
        $result = $stmt->execute();
    }

    if($_POST['updating'] == "Delete")
    {
        $questionNo = $_GET['questionNo'];
        
  $db = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");
  
        $stmt = $db->prepare("DELETE FROM Checklist WHERE QuestionNo = '$questionNo'");
        $result = $stmt->execute();
    }
}
?>


<head>
<body class="bgColor">
<div class="row">
            <div class="col-10">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <td>Question Number</td>
                        <td>Question</td>
                        <td>Action Point</td>
                        <td>Venue</td>
                    </thead>
                    <?php

                    $user = (getInfo());
                        for ($i=0; $i<count($user); $i++):
                    ?>

                    <tr>
                    
                        <td><?php echo $user[$i]['QuestionNo']?></td>
                        <td><?php echo '"' . $user[$i]['Question'] . '"'?></td>
                        <td><?php echo $user[$i]['ActionPoint']?></td>
                        <td><?php echo $user[$i]['Venue']?></td>

                        </tr>
                        <?php endfor ?>

                        </table>    
            </div>
        </div>
</body>

Please select what part of this you would like to edit. <br>
To edit the whole question, we advise deleting this one and <br>
instead adding a new question closer to how you want it to look. <br>
<form method="post">
<select id="updating" name="updating">
  <option value="Question">Question</option>
  <option value="ActionPoint">Action</option>
  <option value="Venue">Venue</option>
  <option value="Delete">Delete</option>
</select>
<input class="form-control" type="text" name = "username">
                        <span style="color: red"><?php echo $nameErr; ?></span>

                   <div class="form-group col-md-4">
                        <input class="btn btn-primary" type="submit" value="Add" name ="submit">
                   </div>
                        </form>
<br>

<?php include("Footer.php");