<?php include("NavigationBar.php");
$totalQs=10;
?>

<!DOCTYPE html>
<html>

<style>
  input[type="radio"] {
    display: inline-block;
  }
</style>

<head>
  <title>10 Point Checklist</title>
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
</head>
<body>


<?php 
function getQuestion($questnum)
{
$db = new SQLite3('ActionPoints.db');

  $stmt = $db->prepare("SELECT Question FROM Checklist WHERE QuestionNo = '$questnum'");
  $result = $stmt->execute();


  $rows_array = [];
  while ($row=$result->fetchArray())
  {
      $rows_array[]=$row;
  }
  return $rows_array;
}
?>


  <h1>10 Point Checklist</h1>
  <form action="ActionPlan.php" method="get">
    <ul>
      <li><?php $first_element = reset(getQuestion("Q1")[0]); echo (implode(',', array($first_element))); ?> <a title="Accessibility tab that shows different features (e.g. ramps/lifts)"><img src="https://shots.jotform.com/kade/Screenshots/blue_question_mark.png" height="13px"/></a>
      <input type='radio' id='Q1-yes' name='Q1' value='yes'>Yes
      <input type='radio' id='Q1-no' name='Q1' value='no'>No
      </li>
      <li><?php $first_element = reset(getQuestion("Q2")[0]); echo (implode(',', array($first_element))); ?><input type='radio' id='Q2-yes' name='Q2' value='yes'>Yes<input type='radio' id='Q2-no' name='Q2' value='no'>No</li>
      <li><?php $first_element = reset(getQuestion("Q3")[0]); echo (implode(',', array($first_element))); ?> <input type='radio' id='Q3-yes' name='Q3' value='yes'>Yes<input type='radio' id='Q3-no' name='Q3' value='no'>No</li>
      <li><?php $first_element = reset(getQuestion("Q4")[0]); echo (implode(',', array($first_element))); ?><input type='radio' id='Q4-yes' name='Q4' value='yes'>Yes<input type='radio' id='Q4-no' name='Q4' value='no'>No</li>
      <li><?php $first_element = reset(getQuestion("Q5")[0]); echo (implode(',', array($first_element))); ?> <input type='radio' id='Q5-yes' name='Q5' value='yes'>Yes<input type='radio' id='Q5-no' name='Q5' value='no'>No</li>
      <li><?php $first_element = reset(getQuestion("Q6")[0]); echo (implode(',', array($first_element))); ?><input type='radio' id='Q6-yes' name='Q6' value='yes'>Yes<input type='radio' id='Q6-no' name='Q6' value='no'>No</li>
      <li><?php $first_element = reset(getQuestion("Q7")[0]); echo (implode(',', array($first_element))); ?> <input type='radio' id='Q7-yes' name='Q7' value='yes'>Yes<input type='radio' id='Q7-no' name='Q7' value='no'>No</li>
      <li><?php $first_element = reset(getQuestion("Q8")[0]); echo (implode(',', array($first_element))); ?> <input type='radio' id='Q8-yes' name='Q8' value='yes'>Yes<input type='radio' id='Q8-no' name='Q8' value='no'>No</li>
      <li><?php $first_element = reset(getQuestion("Q9")[0]); echo (implode(',', array($first_element))); ?> <input type='radio' id='Q9-yes' name='Q9' value='yes'>Yes<input type='radio' id='Q9-no' name='Q9' value='no'>No</li>
      <li><?php $first_element = reset(getQuestion("Q10")[0]); echo (implode(',', array($first_element))); ?> <input type='radio' id='Q10-yes' name='Q10' value='yes'>Yes<input type='radio' id='Q10-no' name='Q10' value='no'>No</li>   
      
      <?php $testingtesting = "Cinema"; ?>
      <ul id="hidden_fornow" <?php if ($testingtesting == "Cinema") { echo 'style="display:block;"'; $totalQs = 11; } else { echo 'style="display:none;"'; } ?>>
        <li><?php $first_element = reset(getQuestion("Q11")[0]); echo (implode(',', array($first_element))); ?><input type='radio' id='Q11-yes' name='Q11' value='yes'>Yes<input type='radio' id='Q11-no' name='Q11' value='no'>No</li>
      </ul>
      
      <input type="hidden" name="totalQuestions" value="">
    </ul>
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
        var percentage = (totalChecked / <?php echo $totalQs; ?>) * 100;
        $('.progress-bar').css('width', percentage + '%');
        $('.progress-bar').text(percentage + '%');
        $('.progress-bar').attr('aria-valuenow', percentage);
      });
    });

    $('#submit-btn').attr('disabled', true);

$(':radio').change(function() {
  var totalChecked = $(':radio:checked').length;
  if (totalChecked == <?php echo $totalQs; ?>) {
    $('#submit-btn').attr('disabled', false);
    
document.querySelector('input[name="totalQuestions"]').value = <?php echo $totalQs; ?>;
  } else {
    $('#submit-btn').attr('disabled', true);
  }
});


  </script>
</body>
</html>

<?php include("Footer.php");?>