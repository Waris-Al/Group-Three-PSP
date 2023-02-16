<?php include("NavigationBar.php"); ?>


<div class="container h-100 d-flex justify-content-center align-items-center" style = "position:relative; top:120px;">
    <form action="QuestionUpdater.php" method="POST" autocomplete="off">
      <div class="form-group">
        <label class="form-label" for="Username1">Email</label>
        <input type="username" id="Username1" class="form-control" name="email">
      </div>
      <div class="form-group">
        <label class="form-label" for="Password1">Password</label>
        <input type="password" id="Password1" class="form-control" name="password">
      </div>
      <div class="form-group" style="display: flex; justify-content: center; margin-top: 20px;">
  <button type="submit" class="btn btn-primary btn-lg" style="width: 200px; height: 50px;">Log in</button>
</div>



<?php include("Footer.php"); ?>