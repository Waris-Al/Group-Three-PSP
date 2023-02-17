<?php session_start();


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  // display the navbar with the logout link
  include 'NavbarLoggedin.php';
} else {
  // display the default navbar
  include 'NavigationBar.php';
}
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

    label {
  font-weight: bold;
  font-size: 1.2em;
}

input[type="radio"] {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  width: 17px;
  height: 17px;
  border: 1px solid black;
  border-radius: 50%;
  transition: background-color 0.2s ease;
}

input[type="radio"][value="yes"]:checked {
  background-color: #319C01;
  border-color: black;
  color: #319C01;
}

input[type="radio"][value="no"]:checked {
  background-color: #D40000;
  border-color: black;
  color: #D40000;
}


.submit-container {
        text-align: left;
        margin-left: 695px;
    }
    
    .submit-button {
        margin-top: 10px;
    }

  </style>


<?php 
function getQuestions()
{
  $venueType = $_GET['type'];
  $db = new SQLite3('ActionPoints.db');
  $venueType = $db->escapeString($venueType);
  $stmt = $db->prepare("SELECT QuestionNo, Question FROM Checklist WHERE (Venue = 'General' OR Venue = '$venueType')");
  $result = $stmt->execute();

  
  $arrayResult = [];
  while ($row = $result->fetchArray())
  { 
      $arrayResult [] = $row; 
  }
  return $arrayResult;
}
$questions = getQuestions();
$amountOfQuestions = count($questions);


?>
<?php foreach ($questions as $row) : ?>


<form action="ActionPlan.php" method="get">
<li>
<?php 
$totalQ = $amountOfQuestions;
$questionNo = $row['QuestionNo'];
$question = $row['Question'];
$idYes = $questionNo . "-yes";
$idNo = $questionNo . "-no";
?>
<label for="<?php echo $idYes ?>" style="display: inline-block; width: 43%;"><?php echo $question ?></label>

<div style="display: inline-block; text-align: left;">
    <input type='radio' id='<?php echo $idYes ?>' name='<?php echo $questionNo ?>' value='yes' style="display: inline-block;">Yes
    <input type='radio' id='<?php echo $idNo ?>' name='<?php echo $questionNo ?>' value='no' style="display: inline-block;">No
</div>
  
<?php endforeach;?>
<br>
<input type="hidden" name="totalQuestions" value="<?php echo $totalQ ?>">
    <input type="hidden" name="company" value="<?php echo $_GET['company'] ?>">
    <div class="submit-container">
    <input type="submit" id="submit-btn" value="Submit" name="Submit">
</div>
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


