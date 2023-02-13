<?php include("NavigationBar.php");
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


<select id="test" name="form_select" onchange="showDiv(this)">
   <option value="0">No</option>
   <option value="1">Yes</option>
</select>     

<script type="text/javascript">
  var totalQuestions = 10;
function showDiv(select){
   if(select.value==1){
    document.getElementById('hidden_fornow').style.display = "block";
    totalQuestions=totalQuestions+2;
   } else{
    document.getElementById('hidden_fornow').style.display = "none";
   }
} 
</script>

  <h1>10 Point Checklist</h1>
  <form action="ActionPlan.php" method="get">
    <ul>
      <li>Accessibility Tab on the Homepage
      <input type='radio' id='task-0-yes' name='task-0' value='yes'>Yes
      <input type='radio' id='task-0-no' name='task-0' value='no'>No
      </li>
      <li>Videos available on website <input type='radio' id='task-1-yes' name='task-1' value='yes'>Yes<input type='radio' id='task-1-no' name='task-1' value='no'>No</li>
      <li>Audio description of video available <input type='radio' id='task-2-yes' name='task-2' value='yes'>Yes<input type='radio' id='task-2-no' name='task-2' value='no'>No</li>
      <li>Link to online accessibility guide <input type='radio' id='task-3-yes' name='task-3' value='yes'>Yes<input type='radio' id='task-3-no' name='task-3' value='no'>No</li>
      <li>Audio version of accessibility guide available <input type='radio' id='task-4-yes' name='task-4' value='yes'>Yes<input type='radio' id='task-4-no' name='task-4' value='no'>No</li>
      <li>Tab on the Homepage <input type='radio' id='task-5-yes' name='task-5' value='yes'>Yes<input type='radio' id='task-5-no' name='task-5' value='no'>No</li>
      <li>Wi-Fi code displayed <input type='radio' id='task-6-yes' name='task-6' value='yes'>Yes<input type='radio' id='task-6-no' name='task-6' value='no'>No</li>
      <li>Information on concession available <input type='radio' id='task-7-yes' name='task-7' value='yes'>Yes<input type='radio' id='task-7-no' name='task-7' value='no'>No</li>
      <li>Adjustable text/contrast on the website <input type='radio' id='task-8-yes' name='task-8' value='yes'>Yes<input type='radio' id='task-8-no' name='task-8' value='no'>No</li>
      <li>Accessible On-Site Parking <input type='radio' id='task-9-yes' name='task-9' value='yes'>Yes<input type='radio' id='task-9-no' name='task-9' value='no'>No</li>   
      <ul id="hidden_fornow" style="display:none;">
      <li>Hidden question <input type='radio' id='task-10-yes' name='task-10' value='yes'>Yes<input type='radio' id='task-10-no' name='task-10' value='no'>No</li>
      <li>Hidden question 2<input type='radio' id='task-11-yes' name='task-11' value='yes'>Yes<input type='radio' id='task-11-no' name='task-11' value='no'>No</li>
      
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
        var percentage = (totalChecked / totalQuestions) * 100;
        $('.progress-bar').css('width', percentage + '%');
        $('.progress-bar').text(percentage + '%');
        $('.progress-bar').attr('aria-valuenow', percentage);
      });
    });

    $('#submit-btn').attr('disabled', true);

$(':radio').change(function() {
  var totalChecked = $(':radio:checked').length;
  if (totalChecked == totalQuestions) {
    $('#submit-btn').attr('disabled', false);
    
document.querySelector('input[name="totalQuestions"]').value = totalQuestions;
  } else {
    $('#submit-btn').attr('disabled', true);
  }
});


  </script>
</body>
</html>

<?php include("Footer.php") 

//

?>

