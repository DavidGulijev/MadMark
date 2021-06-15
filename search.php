<!--Connects between php pages -->
<?php
  include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Games</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
	<!-- Nav Bar -->

  <div class="topnav">
    <div class="logo"><a href="home.html"><img src ="logo.JPG" alt="Logo"></a></div>
    <a href="home.html">Home</a>
    <a class="active" href="index.php">Games</a>
    <a href="about.html">About</a>
  </div>
	<!-- Header -->

  <div class="header">
    <h1>GAMES</h1>
  </div>
  <div class="game-container">
    <div class="game-form">
      <div class="game-search">
        <form action="search.php" method="POST">
          <input type="text" name="search" placeholder="Search">
          <button type="submit" name="submit-search">Search</button>
        </form>
    </div>

    <?php
  include 'header.php';
?>

<?php
			/*PHP part of the website, this is where the database gets displayed onto the page, it is connected to a PHPmyadmin server, this connects with the other php files such as dbh.php
			This bit also includes a little result feedback! */
    if (isset($_POST['submit-search'])) {
      $search = mysqli_real_escape_string($conn, $_POST['search']);
      $sql = "SELECT * FROM games_data WHERE Names LIKE '%$search%' OR Platform LIKE '%$search%' OR Publisher LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);
    
    echo "There are ".$queryResult." Results!"; 

    if ($queryResult >0){
      while ($row = mysqli_fetch_assoc($result)){
        echo "<div class='game-box'>
        <h3>Title: ".$row['Names']."</h3>
        <p>Publisher: ".$row['Publisher']."</p>
        <p>Description: ".$row['Description']."</p>
        <p>MainChar: ".$row['MainChar']."</p>
        <p>Platform: ".$row['Platform']."</p>
        <p>Pegi: ".$row['Pegi']."</p>
        <p>Stock: ".$row['Stock']."</p>
        <p>Price: ".$row['Price']."</p>
        <p>Rating: ".$row['Rating']."</p>
       </div>";
      }
    } else {
      echo "There are no results";
    }
    }
?>
</div>
    </div>
  </div>

	<!-- Footer -->
    <footer class="site-footer">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-md-6">
							<h6>About Us</h6>
								<!-- description  -->
							<p class="text-justify">Mad Mark’s Magic Games is a local shop in Elgin that sells computer games. Use the search box to find a game suited to you! Or, alternatively use the about page to contact us today!</p>
						</div>
							<!-- the email, address, number is here -->
						<div class="col-xs-6 col-md-3">
							<h6>Information</h6>
							<div class="information">
								<div class="location">
									<span class="fas fa-map-marker-alt"></span>
									<span class="text">Elgin, Scotland</span>
								</div>
								<div class="number">
									<span class="fas fa-phone-alt"></span>
									<span class="text">+44 0792307261</span>
								</div>
								<div class="email">
									<span class="fas fa-envelope"></span>
									<a href = "mailto:vilniustravels@mail.com">MadMarkElgin@mail.com</a>
								</div>
							</div>
						</div>
        	<!-- Links to webpages -->

						<div class="col-xs-6 col-md-3">
							<h6>Quick Links</h6>
							<ul class="footer-links">
								<li><a href="home.html">Home</a></li>
								<li><a href="index.php">Games</a></li>
								<li><a href="about.html">About</a></li>
							</ul>
						</div>
					</div>
					<hr>
				</div>
				  <!-- basic copyright text with link on VilniusTravels -->
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-6 col-xs-12">
							<p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by 
								<a href="about.html">Mad Mark’s Magic Games</a>.
							</p>
						</div>
					</div>
				</div>
			</footer>

</body>
</html>