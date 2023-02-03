<?php include("NavigationBar.php") ?>

<!DOCTYPE html>
<html>
<head>
  <title>10 Point Checklist</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .progress {
      width: 100%;
      height: 20px;
    }

    .progress-bar {
      height: 100%;
    }
  </style>
</head>
<body>
  <h1>10 Point Checklist</h1>
  <form>
    <ul>
      <?php 
        for ($i = 1; $i <= 10; $i++) {
          echo "<li>Task $i<input type='checkbox' id='task-$i' name='task-$i' value='done'></li>";
        }
      ?>
    </ul>
  </form>
  <div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="0"
      aria-valuemin="0" aria-valuemax="100" style="width: 0%">
      0%
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $(':checkbox').change(function() {
        var totalChecked = $(':checkbox:checked').length;
        var percentage = (totalChecked / 10) * 100;
        $('.progress-bar').css('width', percentage + '%');
        $('.progress-bar').text(percentage + '%');
        $('.progress-bar').attr('aria-valuenow', percentage);
      });
    });
  </script>
</body>
</html>




<?php include("Footer.php") ?>