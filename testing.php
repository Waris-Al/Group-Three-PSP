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
$db = new SQLite3('C:\xampp\htdocs\Group-Three-PSP\ActionPoints.db');

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
<?php

    for ($i=1; $i<11; $i++):
        $testString = "Q" . $i;
?>

<form action="ActionPlan.php" method="get">
<li>
<?php $totalQs=10;
$first_element = reset(getQuestion($testString)[0]); echo (implode(',', array($first_element))); 
$idYes = "Q" . $i . "-yes";
$idNo = "Q" . $i . "-no";
?>
<input type='radio' id='<?php echo $idYes ?>' name='<?php echo $testString ?>' value='yes'>Yes<input type='radio' id='<?php echo $idNo ?>' name='<?php echo $testString ?>' value='no'>No
</li>
  
<?php endfor;?>
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