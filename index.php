<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  // display the navbar with the logout link
  include 'NavbarLoggedin.php';
  $welcomemessage = "Welcome back";
} else {
  // display the default navbar
  include 'NavigationBar.php';
  $welcomemessage = "A BIG Hello From Everybody Welcome!";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome to Access For All</title>
  <style>
    /* Add styles for a visually appealing homepage */
    body {
    
  font-family: Arial, sans-serif;
  text-align: center;
  background-color: #f2f2f2;
}

h1 {
  font-size: 36px;
  margin-top: 50px;
}

p {
  font-size: 20px;
  margin: 20px auto;
  width: 80%;
}

.btn {
  background-color: #4285F4;
  border-radius: 40px;
  color: #fff;
  padding: 12px 20px;
  border-radius: 5px;
  text-decoration: none;
  margin-top: 20px;
  display: inline-block;
}

.btn:hover {
  background-color: #3367d6;
}
.features {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  margin-top: 50px;
}

.feature {
  margin: 20px;
  width: 300px;
  text-align: center;
}

.feature img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 10px;
  margin-bottom: 20px;
}

.feature h3 {
  font-size: 24px;
  margin-top: 0;
  margin-bottom: 10px;
}

.feature p {
  font-size: 16px;
  margin: 0 auto 20px;
  width: 80%;
  line-height: 1.5;
}


  </style>
</head>
<body>
  <h1><?php echo $welcomemessage ?></h1>
  <p>We are committed to creating a welcoming environment for everyone, including those with accessibility needs. Join our community today and start exploring!</p>

  <!-- Add more content here -->
  
</body>
</html>



<div class="features">
  <div class="feature">
    <img src="https://images.pexels.com/photos/5691279/pexels-photo-5691279.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Search for Accessible Venues">
    <h3>Find Accessible Venues</h3>
    <p>Use our search tool to find accessible venues near you. Leave a review to help others find great places too.</p>
    <br>
    <a href="CheckVenue.php" class="btn">Search Now</a>
  </div>

  <div class="feature">
    <img src="https://images.pexels.com/photos/2610962/pexels-photo-2610962.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Connect with Others">
    <h3>Support The Movement</h3>
    <p>Join our community of businesses committed to accessibility and inclusivity. Share your experiences and learn from others.</p>
    <a href="details.php" class="btn">Join Now</a>
  </div>

  <div class="feature">
    <img src="https://images.pexels.com/photos/4063789/pexels-photo-4063789.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Raising Awareness">
    <h3>Raising Awareness</h3>
    <p>Help us promote accessibility and inclusivity by joining us on our journey to an open, more accessible world. Together, we can make a difference.</p>
    <a href="Aboutus.php" class="btn">About us</a>
  </div>
</div>
<style>

</style>
<?php require("Footer.php");?>

