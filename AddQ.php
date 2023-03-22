<?php include("NavigationBar.php"); ?>

<?php 
function getQs()
{
  $db = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");
  $stmt = $db->prepare("SELECT TOP 1 * FROM Checklist WHERE QuestionNo LIKE 'Q%' ORDER BY CAST(SUBSTRING(QuestionNo, 2, LEN(QuestionNo)) AS INT) DESC");
  $result = $stmt->execute();
  
  $arrayResult = [];
  $rows = $stmt->fetchAll();
  foreach ($rows as $row) {
      $arrayResult[] = $row;
  }
  return $arrayResult;
}
$lastQ = substr((getQs())[0]['QuestionNo'], 1);
$lastQ = $lastQ+1;
$lastQ = "Q" . $lastQ;


$nameErr = $pwderr = $venueErr = $invalidMesg = "";

if (isset($_POST['submit'])) {

    if ($_POST['username']=="") {
        $nameErr = "Enter the Question";
      } 
      
      if ($_POST['password']==null) {
        $pwderr = "Enter the Action Point";
      }

      if ($_POST['venue']==null) {
        $pwderr = "Enter the venue";
      }

    if($_POST['username'] != null && $_POST['password'] !=null & $_POST['venue'] != null)
    {
        $quest = $_POST['username'];
        $point = $_POST['password'];
        $ven = $_POST['venue']; 
        $db = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");
        $stmt = $db->prepare("INSERT INTO Checklist (QuestionNo, Question, ActionPoint, Venue) VALUES ('$lastQ', '$quest', '$point', '$ven')");
        $result = $stmt->execute();
        header("Location: QuestionUpdater.php");
        
    }
}
?>

<form method="post">
                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Question</label>
                        <input class="form-control" type="text" name = "username">
                        <span style="color: red"><?php echo $nameErr; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Action point <a title="The way for the business to improve (e.g. 'Add subtitled screenings')"><img src="https://shots.jotform.com/kade/Screenshots/blue_question_mark.png" height="13px"/></a></label>
                        <input class="form-control" type="text" name = "password">
                        <span style="color: red"><?php echo $pwderr; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                   <label class="control-label labelFont">Venue Type</label><br>
                    <select name="venue" required="true">
                    <option value="General">General</option>
                    <option value="restaurant">Restaurant</option>
                    <option value="cinema">Cinema</option>
                    <option value="gym">Gym</option>
                  </select>
                  </div>

                   <div class="form-group col-md-4">
                        <input class="btn btn-primary" type="submit" value="submit" name ="submit">
                   </div>
                </form>

<?php require("Footer.php");
?>