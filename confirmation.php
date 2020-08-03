<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
<!--
Hemanth Sai Challa
Red_ID:824670867
CS545
Assignment #4
Fall 2019
Instructor:Cyndi Chie
-->
<!--Head-->
<head>
	<title>San Diego State University Natural History Museum</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="form.css">
</head>
<!--Body-->
<body>
	<!--Start of Header-->
	<header>
		<div class="columns">
			<div id="logo">
				<a href="index.html">
				<img src="images/logo.png" alt="logo of sdsu">
				<h3>San Diego State University <br>Natural History Museum </h3>
				</a>
			</div>
		</div>
			<!--Navigation/Menubar-->
			<nav id="nav">
			<ul class="columns">
				<li><a href="index.html">Home</a></li>
				<li><a href="about.html">About</a></li>				
				<li><a href="exhibitions.html">Exhibitions</a></li>
				<li><a href="events.html">Events</a></li>
				<li><a href="science.html">Science</a></li>
				<li class="dropdown"><a href="#">Get Involved</a>
					<div class="dropdown-content">
						<a href="member.html">Become a member</a>
						<a href="donate.html">Donate</a>
						<a href="volunteer.html">Volunteer Appication</a>
					</div>
				</li>
			</ul>
		</nav>
		<!--End of Header-->
	</header>
	<!--Start of mainbody content -->
  <hr/>

	<?php
	  $firstname = $_SESSION['firstname'];
	  $lastname = $_SESSION['lastname'];
	  $email = $_SESSION['email'];
	  $address = $_SESSION['address'];
	  $phone = $_SESSION['phone'];
	  $event = $_SESSION['eventname'];
	  $age = $_SESSION['age'];
	  $totalattendees = $_SESSION['totalattendees'];
	  $attendeesone = $_SESSION['attendeesone'];
	  $attendeestwo =  $_SESSION['attendeestwo'];
	  $attendeesthree =  $_SESSION['attendeesthree'];
	  $attendeesfour =  $_SESSION['attendeesfour'];
	  $otherevents =  $_SESSION['otherevents'];
	?>


	<div class="columns">
		<article class="main">
			<h2>Sign up for the Events</h2>

				<h1>Thank you for subscribing to our events</h1>

				  <fieldset>
          <div class="signupsuccess">
						<span class = "info">First name: <?php echo " " . $firstname;?></span>
						<span class = "info">Last name: <?php echo " " . $lastname;?></span>
						<?php
						  if (!empty($address))
						  echo "<span class = info>Address: ".$address."</span>";
						?>
						<?php
						  if (!empty($phone))
						  echo "<span class = info>Phone: ".$phone."</span>";
						?>
						<span class = "info">Email: <?php echo " " . $email;?></span>
						<span class = "info">Event: <?php echo " " . $event;?></span>
						<span class = "info">Total number of attendees: <?php echo " " . $totalattendees;?></span>
						<span class = "info">Number of attendees under 5 years old: <?php echo " " . $attendeesone;?></span>
						<span class = "info">Number of attendees between 5 and 12 years old: <?php echo " " . $attendeestwo;?></span>
						<span class = "info">Number of attendees 13 to 17 years old: <?php echo " " . $attendeesthree;?></span>
						<span class = "info">Number of attendees 18+ years old: <?php echo " " . $attendeesfour;?></span>
						<?php
						  if (!empty($otherevents))
						  echo "<span class = info>Other events you want to be offered: ".$otherevents."</span>";
						?>
					</div>
			    </fieldset>
			    <div class="column">
                    <form action="index.html">
                       <input type="submit" value="Go to Homepage">
                    </form>			
                </div>
		</article>		
	</div>
	<!--End of mainbody content-->
	<!--start of Footer-->
	<footer>
		<div class="columns">
			<div class="column">
				<h3>Newsletter</h3>
				<p>Receive the latest information about our new exhibitions, programs, events, and more.</p>
				<form action="#">
					<input type="email" placeholder="Email address" name="email"/>
					<input type="submit" value="Submit">
				</form>
			</div>
			<div class="column">
				<h3>Museum Hours</h3>
				<p>Daily 10 AM to 5 PM</p>
				<p>Closed when the campus is closed.</p>
				<p>Hours subject to change. </p>
			</div>
			<div class="column">
				<h3>Important Links</h3>
				<ul>
					<li><a href="member.html">Become a Member </a></li>
					<li><a href="volunteer.html">Volunteer Application </a></li>
					<li><a href="donate.html">Donate Now!</a></li>
				</ul>
			</div>
			<div class="column">
				<h3>Connect with us</h3>
				<p>San Diego State University<br/>
					Natural History Museum<br/>
					San Diego, CA 92182-0000</p>
				<p>(619)594-5200</p>
				<address>Mailing address:nhmuseum@sdsu.edu</address>		
			</div>
		</div>
	</footer>
	<!--Footer end-->
</body>
	<!--/BODY-->
</html>
<!--End of HTML-->
