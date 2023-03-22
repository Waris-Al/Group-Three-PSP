<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  // display the navbar with the logout link
  include 'NavbarLoggedin.php';
  $welcomemessage = "Welcome back";
} else {
  // display the default navbar
  include 'NavigationBar.php';
}
try {
  $db = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");
} catch (PDOException $e) {
  die("Failed to connect: " . $e->getMessage());
}

$searchErr = '';
$building='';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $db->prepare("select * from company where city like '%$search%' or btype like '%$search%'");
        $stmt->execute();
        $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($building);
         
    }else if(!empty($_POST['search1'])){

        $search = $_POST['search1'];
        $stmt = $db->prepare("select * from company where city like '%$search%' or btype like '%$search%'");
        $stmt->execute();
        $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else if(!empty($_POST['search2'])){

      $search = $_POST['search2'];

    $wchair = "wchair";
    $hearing = "hearing";
    $parking = "parking";
    $check = "yes";

      if(strcmp($search,$wchair) == 0){
        $stmt = $db->prepare("select * from company where id IN(select cid from questions where wchair like '%$check%')");
        $stmt->execute();
        $building = $stmt->fetchAll(PDO::FETCH_ASSOC);

      }else if (strcmp($search,$hearing) == 0){

        $stmt = $db->prepare("select * from company where id IN(select cid from questions where hearing like '%$check%')");
        $stmt->execute();
        $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
      }else if(strcmp($search,$parking) == 0){
        $stmt = $db->prepare("select * from company where id IN(select cid from questions where parking like '%$check%')");
        $stmt->execute();
        $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
      }

      
  }
    else
    {
        $searchErr = "Please enter the information";
    }
    
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>A HUGE Welcome From Access For All</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap.min.css">
  <!-- Custom styles -->
  <style>
    .container {
      width: 70%;
      margin: 0 auto;
      padding: 20px;
    }
    h1, h2, h3, h4, h5, h6 {
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="mb-3">Search Filters</h2>

    <form action="#" method="post">
      <div class="form-group row">
        <label for="search-keywords" class="col-sm-4 col-form-label"><b>Search with keywords:</b></label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="search-keywords" name="search" placeholder="Search here">
        </div>
      </div>

      <div class="form-group row">
        <label for="business-type" class="col-sm-4 col-form-label">Business Type:</label>
        <div class="col-sm-8">
          <select class="form-control" id="business-type" name="search1">
            <option value="">All</option>
            <option value="restaurant">Restaurant</option>
            <option value="cinema">Cinema</option>
            <option value="gym">Gym</option>
            <option value="General">Other</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="disability-type" class="col-sm-4 col-form-label">Disability Type:</label>
        <div class="col-sm-8">
          <select class="form-control" id="disability-type" name="search2">
            <option value="">All</option>
            <option value="hearing">Hearing</option>
            <option value="wchair">Wheel Chair</option>
            <option value="parking">Parking</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
          <button type="submit" name="save" class="btn btn-success">Submit</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
</body>
</html>
    <br/><br/>


    <br/>
    <h3><u>Search Result</u></h3><br/>
    <div class="table-responsive">          
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Company Name</th>
            <th>City</th>
            <th>Postal</th>
            <th>Business Type</th>
          </tr>
        </thead>
        <tbody>
                <?php
                 if(!$building)
                 {
                    echo '<tr>No data found</tr>';
                 }
                 else{
                    foreach($building as $key=>$value)
                    {
                        ?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><a href="<?php echo $value['cname'] . '.pdf'; ?>" target="_blank" onclick="window.open('<?php echo $value['cname'] . '.pdf'; ?>','newwindow','width=800,height=600'); return false;"><?php echo $value['cname'];?></td>
                        <td><?php echo $value['city'];?></td>
                        <td><?php echo $value['postal'];?></td>
                        <td><?php echo $value['btype'];?></td>
                    </tr>
                         
                        <?php
                    }
                     
                 }
                ?>
             
         </tbody>
      </table>
    </div>
</div>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>