<?php include("NavigationBar.php"); ?>

<?php 
function getQs()
{
  $db = new SQLite3('ActionPoints.db');
  $stmt = $db->prepare("SELECT * FROM Checklist WHERE QuestionNo LIKE 'Q%' ORDER BY CAST(SUBSTR(QuestionNo, 2) AS UNSIGNED) DESC LIMIT 1");
  $result = $stmt->execute();
  
  $arrayResult = [];//prepare an empty array first
  while ($row = $result->fetchArray()){ // use fetchArray(SQLITE3_NUM) - another approach
      $arrayResult [] = $row; //adding a record until end of records
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
        $db = new SQLite3('ActionPoints.db');
        $stmt = $db->prepare("INSERT INTO Checklist (QuestionNo, Question, ActionPoint, Venue) VALUES ('$lastQ', '$quest', '$point', '$ven')");
        $result = $stmt->execute();
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
                        <label class="control-label labelFont">Action point</label>
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