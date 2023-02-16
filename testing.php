<?php include("NavigationBar.php");
$amountOfQuestions=10;
?>

<!DOCTYPE html>
<html>

<style>
  input[type="radio"] {
    display: inline-block;
  }
</style>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .progress {
      width: 50%;
      height: 20px;
      margin-left: 10px;
    }

    .progress-bar {
      height: 100%;
    }
  </style>


<?php 
function getQuestionsNos()
{
  $venueType = $_GET['company'];
  $db = new SQLite3('ActionPoints.db');
  $stmt = $db->prepare("SELECT QuestionNo FROM Checklist WHERE (Venue = 'General' OR Venue = '$venueType')");
  $result = $stmt->execute();
  
  $arrayResult = [];
  while ($row = $result->fetchArray())
  { 
      $arrayResult [] = $row; 
  }
  return $arrayResult;
}
$amountOfQuestions=count(getQuestionsNos());
$amountOfQuestions++;


function getQuestion($questnum)
{
    
$venueType = $_GET['company'];
$db = new SQLite3('ActionPoints.db');

  $stmt = $db->prepare("SELECT Question FROM Checklist WHERE QuestionNo = '$questnum' AND (Venue = 'General' OR Venue = '$venueType')");
  $result = $stmt->execute();
  


  $rows_array = [];
  while ($row=$result->fetchArray())
  {
      $rows_array[]=$row;
  }
  return $rows_array;
}
?>
<?php
$questionNumbers = getQuestionsNos();
foreach ($questionNumbers as $row) : ?>


<form action="ActionPlan.php" method="get">
<li>
<?php 
$totalQ = $amountOfQuestions-1;
$first_element = reset(getQuestion($row['QuestionNo'])[0]); echo (implode(',', array($first_element))); 
$idYes = $row['QuestionNo'] . "-yes";
$idNo = $row['QuestionNo'] . "-no";
?>
<input type='radio' id='<?php echo $idYes ?>' name='<?php echo $row['QuestionNo'] ?>' value='yes'>Yes<input type='radio' id='<?php echo $idNo ?>' name='<?php echo $row['QuestionNo'] ?>' value='no'>No
</li>
  
<?php endforeach;?>
<input type="hidden" name="totalQuestions" value="">
    <input type="submit" id="submit-btn" value="Submit" name="Submit">
  </form>

 


  <div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="0"
      aria-valuemin="0" aria-valuemax="100" style="width: 0%">
      0%
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $(':radio').change(function() {
        var totalChecked = $(':radio:checked').length;
        var percentage = (totalChecked / <?php echo $totalQ; ?>) * 100;
        $('.progress-bar').css('width', percentage + '%');
        $('.progress-bar').text(Math.round(percentage) + '%');
        $('.progress-bar').attr('aria-valuenow', percentage);
      });
    });

    $('#submit-btn').attr('disabled', true);

$(':radio').change(function() {
  var totalChecked = $(':radio:checked').length;
  if (totalChecked == <?php echo $totalQ; ?>) {
    $('#submit-btn').attr('disabled', false);
    
document.querySelector('input[name="totalQuestions"]').value = <?php echo $totalQ; ?>;
  } else {
    $('#submit-btn').attr('disabled', true);
  }
});


  </script>
</body>
</html>

<?php include("Footer.php");?>