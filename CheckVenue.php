<?php
try {
  $db = new PDO('sqlite:ActionPoints.db');
} catch (PDOException $e) {
  die("Failed to connect: " . $e->getMessage());
}
session_start();


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  // display the navbar with the logout link
  include 'NavbarLoggedin.php';
} else {
  // display the default navbar
  include 'NavigationBar.php';
}

$searchErr = '';
$building = '';
if(isset($_POST['save'])) {
    if(!empty($_POST['search'])) {
        $search = $_POST['search'];
        $stmt = $db->prepare("SELECT * FROM company WHERE city LIKE :search OR btype LIKE :search");
        $stmt->execute(array(':search' => '%'.$search.'%'));
        $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else if(!empty($_POST['search1'])) {
        $search = $_POST['search1'];
        $stmt = $db->prepare("SELECT * FROM company WHERE city LIKE :search OR btype LIKE :search");
        $stmt->execute(array(':search' => '%'.$search.'%'));
        $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else if(!empty($_POST['search2'])) {
        $search = $_POST['search2'];
        $wchair = "wchair";
        $hearing = "hearing";
        $parking = "parking";
        $check = "yes";
        if(strcmp($search, $wchair) == 0) {
            $stmt = $db->prepare("SELECT * FROM company WHERE id IN (SELECT cid FROM questions WHERE wchair LIKE :check)");
            $stmt->execute(array(':check' => '%'.$check.'%'));
            $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else if (strcmp($search, $hearing) == 0) {
            $stmt = $db->prepare("SELECT * FROM company WHERE id IN (SELECT cid FROM questions WHERE hearing LIKE :check)");
            $stmt->execute(array(':check' => '%'.$check.'%'));
            $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else if(strcmp($search, $parking) == 0) {
            $stmt = $db->prepare("SELECT * FROM company WHERE id IN (SELECT cid FROM questions WHERE parking LIKE :check)");
            $stmt->execute(array(':check' => '%'.$check.'%'));
            $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    } else {
        $searchErr = "Please enter the information";
    }
}

?>
<html>
<head>
<title>A HUGE Welcome From Everybody Welcome</title>
<link rel="stylesheet" href="bootstrap.css" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap-theme.css" crossorigin="anonymous">
<style>
.container{
    width:70%;
    height:30%;
    padding:20px;
}
</style>
</head>
 
<body>
    <div class="container">
    <h2 class="mb-3">Search Filters</h2>
    <br/><br/>
    
    <form class="form-vertical" action="#" method="post">
    <div class="column">
        <div class="form-group">
<?php 
/*
            <label class="control-label col-sm-4" for="email"><b>Search with keywords:</b>:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="search" placeholder="search here">
            </div>
*/

?>
            <br/>

            <div class="col-md-4">
              <label for="Business-type">Business Type</label>
              <select class="form-select" name="search1">
                <option value="">All</option>
                <option value="restaurant">Restaurant</option>
                <option value="General">General</option>
                <option value="cinema">Cinema</option>
                <option value="gym">Gym</option>
              </select>
            </div>


            <div class="col-md-4">
              <label for="disability-type">Needs</label>
              <select class="form-select" name="search2">
                <option value="">All</option>
                <option value="hearing">Hearing</option>
                <option value="wchair">Wheel Chair</option>
                <option value="parking">Parking</option>
              </select>

              </div>
            <div class="col-sm-2">
              <button type="submit" name="save" class="btn btn-success btn-sm">Submit</button>
            </div>
        </div>
        <div class="form-group">
            <span class="error" style="color:red;">* <?php echo $searchErr;?></span>
        </div>
         
    </div>
    </form>
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
                    } // INSERT INTO company (id, email, pass, cname, city, postal, btype) VALUES (123, "test@test.com", "pass", "shouldhopefullywork", "sheff", "S4", "General")
                    //INSERT INTO questions (id, cid, wchair, video, audio, hearing, parking)
                     
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



