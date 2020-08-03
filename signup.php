<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
<!--
Hemanth Sai Challa
Red_ID:824670867
CS545
Assignment #3
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
	 // define variables and set to empty values
	 $firstname = $lastname = $email = $phone = $address = "";
	 $event = $otherevents = "";
	 $calculateattendees = $totalattendees = $attendeesone = $attendeestwo = $attendeesthree = $attendeesfour = "";
	 $firstnameErr = $lastnameErr = $emailErr = $eventErr = "";
	 $totalattendeesErr = $attendeesoneErr = $attendeestwoErr = $attendeesthreeErr = $attendeesfourErr = "";

	 function test_input($data) {
	            $data = trim($data);
	            $data = stripslashes($data);
	            $data = htmlspecialchars($data);
	            return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	    $valid = true;
		// validation of first name
	    $fname = test_input(filter_input(INPUT_POST, "firstname"));
		if (empty(filter_input(INPUT_POST, "firstname"))) {
	    $valid = false;
		  $firstnameErr = "First name is required";
	  }else { 
		     if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
				$valid = false;
                $firstnameErr = "Only letters and white space allowed";
			  }
			else{
			    $firstname = test_input(filter_input(INPUT_POST, "firstname"));
	            $_SESSION['firstname'] = $firstname;
	           }
	  }
	  //validation of lastname
	  $lname = test_input(filter_input(INPUT_POST, "lastname"));
	  if (empty(filter_input(INPUT_POST, "lastname"))) {
	      $valid = false;
		  $lastnameErr = "Last name is required";
	  }else {
		    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
				$valid = false;
                $lastnameErr = "Only letters and white space allowed";
			  }
			else{
			$lastname = test_input(filter_input(INPUT_POST, "lastname"));
	        $_SESSION['lastname'] = $lastname;
			}
	  }
	  
	  //validation of email address
	  if (empty(filter_input(INPUT_POST, "email"))) {
	    $valid = false;
			$emailErr = "Email is required";
	  }else {
			$email = test_input(filter_input(INPUT_POST, "email"));
	               // check if e-mail address is well-formed
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$valid = false;
					$emailErr = "Invalid email format, please enter valid email";
				}else {
					$_SESSION['email'] = $email;
				}
		}
		
	  if ($_POST['eventname'] == "unknown") {
			$valid = false;
			$eventErr = "Event is required";
	  }else {
			$event = test_input($_POST['eventname']);
			$_SESSION['eventname'] = $event;
		}
		
		//validation for number of attendees under 5 years
		if (empty(filter_input(INPUT_POST, "attendeesone"))  and (filter_input(INPUT_POST, "attendeesone"))!="0") {
			$valid = false;
			$attendeesoneErr = "Number of attendees is required";
	  }else {
			$attendeesone = test_input(filter_input(INPUT_POST, "attendeesone"));
			if(is_numeric($attendeesone)) {
				$_SESSION['attendeesone'] = $attendeesone;
				$calculateattendees += $attendeesone;
			}else {
				$attendeesoneErr = "Invalid number format, please enter valid number";
			}
		}
		
		//validation for number of attendees between 5 and 12 years old
		if (empty(filter_input(INPUT_POST, "attendeestwo"))  and (filter_input(INPUT_POST, "attendeestwo"))!="0") {
			$valid = false;
			$attendeestwoErr = "Number of attendees is required";
	  }else {
			$attendeestwo = test_input(filter_input(INPUT_POST, "attendeestwo"));
			if(is_numeric($attendeestwo)) {
				$_SESSION['attendeestwo'] = $attendeestwo;
				$calculateattendees += $attendeestwo;
			}else {
				$attendeestwoErr = "Invalid number format, please enter valid number";
			}
		}
		
		//validation for number of attendees from 13 to 17 years old
       if (empty(filter_input(INPUT_POST, "attendeesthree"))  and (filter_input(INPUT_POST, "attendeesthree"))!="0") {
			$valid = false;
			$attendeesthreeErr = "Number of attendees is required";
	  }else {
			$attendeesthree = test_input(filter_input(INPUT_POST, "attendeesthree"));
			if(is_numeric($attendeesthree)) {
				$_SESSION['attendeesthree'] = $attendeesthree;
				$calculateattendees += $attendeesthree;
			}else {
				$attendeesthreeErr = "Invalid number format, please enter valid number";
			}
		}
		
		//validation for number of attendees over 18 years old
		if (empty(filter_input(INPUT_POST, "attendeesfour"))  and (filter_input(INPUT_POST, "attendeesfour"))!="0") {
			$valid = false;
			$attendeesfourErr = "Number of attendees is required";
	    }else {
			$attendeesfour = test_input(filter_input(INPUT_POST, "attendeesfour"));
			if(is_numeric($attendeesfour)) {
				$_SESSION['attendeesfour'] = $attendeesfour;
				$calculateattendees += $attendeesfour;
			}else {
				$attendeesfourErr = "Invalid number format, please enter valid number";
			}
		}		
		
		//Validation for total number of attendees
		if (empty(filter_input(INPUT_POST, "attendees"))) {
			$valid = false;
			$totalattendeesErr = "Total number of attendees is required";
	    }else {
			$totalattendees = test_input(filter_input(INPUT_POST, "attendees"));
			if(is_numeric($totalattendees)) {
				if($totalattendees == $calculateattendees) {
					$_SESSION['totalattendees'] = $totalattendees;
				} else {
					$totalattendeesErr = "Total number of attendees is incorrect";
				}
			}else {
				$totalattendeesErr = "Invalid number format, please enter valid number";
			}
		}
		
	  if (empty(filter_input(INPUT_POST, "address"))) {
	    $_SESSION['address'] = "";
	  }else {
			$_SESSION['address'] = test_input(filter_input(INPUT_POST, "address"));
		}
		
		if (empty(filter_input(INPUT_POST, "phone"))) {
	    $_SESSION['phone'] = "";
	  }else {
			$_SESSION['phone'] = test_input(filter_input(INPUT_POST, "phone"));
		}
		
	  if (empty($_POST['otherevents'])) {
	    $_SESSION['otherevents'] = "";
	  }else {
			$_SESSION['otherevents'] = test_input($_POST['otherevents']);
		}
		
		//Form submission
		if ($valid){
			header("location:confirmation.php");
	    exit();
	  }
	}
	?>

	<div class="columns">
		<article class="main">
			<h2>Sign up for the Events</h2>

				<h3>Please fill out this form and click Submit when finished</h3>
				<p><span class="required">*</span> Required fields</p>

				<form class="signup" action ="<?php
				         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				  <fieldset>
				  <legend>Personal information:</legend>
          <div class="signupform">
						<div class="gridview">
								<label for="firstname">First name<span class="required">*</span>:</label>
								<div>
								  <input type="text" name="firstname" id="firstname" size="40"  maxlength="60" value="<?php echo $firstname; ?>" /><br/><span class = "error"><?php echo " " . $firstnameErr;?></span>
							  </div>
						</div>

						<div class="gridview">
								<label for="lastname">Last name<span class="required">*</span>:</label>
								<div>
								  <input type="text" name="lastname" id="lastname" size="40"  maxlength="60" value="<?php echo $lastname; ?>"/><br/><span class = "error"><?php echo " " . $lastnameErr;?></span>
								</div>
						</div>

						<div class="gridview">
								<label for="address">Address:</label>
								<div>
								  <input type="text" name="address" id="address" size="40"  maxlength="60" value="<?php echo $address; ?>"/>
								</div>
						</div>

						<div class="gridview">
								<label for="phone">Phone:</label>
								<div>
								  <input type="text" name="phone" id="phone" size="40"  maxlength="10" value="<?php echo $phone; ?>"/>
							  </div>
						</div>

						<div class="gridview">
								<label for="email">Email<span class="required">*</span>:</label>
								<div>
								  <input type="email" name="email" id="email" size="40"  maxlength="60" value="<?php echo $email; ?>"/><br/><span class = "error"><?php echo " " . $emailErr;?></span>
								</div>
						</div>

						<div class="gridview">
								<label for="eventname">Event name<span class="required">*</span>:</label>
								<div>
								<select name="eventname" id="eventname">
									<option value="unknown" selected>--Select event--</option>
									<option value="Mid-point tap check">First Saturday November: Mid-point tap check</option>
									<option value="Training and trap deployment">First Saturday October: Training and trap deployment</option>
									<option value="Collect traps">First Saturday December: Collect traps, transport to The Museum, and analyze what you’ve found under a microscope</option>
									<option value="Shot Hole Borer Citizen Science Project">Shot Hole Borer Citizen Science Project</option>
									<option value="State of Biodiversity Symposium">State of Biodiversity Symposium</option>
								</select><br/><span class = "error"><?php echo " " . $eventErr;?></span>
							</div>
						</div>
						<div class="attendees">
							<div class="gridview">
									<label for="attendees">Total number of attendees<span class="required">*</span>:</label>
									<div>
									  <input type="text" name="attendees" id="attendees" size="40"  maxlength="60" value="<?php echo $totalattendees; ?>"/><br/><span class = "error"><?php echo " " . $totalattendeesErr;?></span>
									</div>
							</div>
						<div class="gridview">
								<label for="attendeesone">Number of attendees under 5 years old<span class="required">*</span>:</label>
								<div>
								  <input type="text" name="attendeesone" id="attendeesone" size="40"  maxlength="60" value="<?php echo $attendeesone; ?>"/><br/><span class = "error"><?php echo " " . $attendeesoneErr;?></span>
								</div>
						</div>
						<div class="gridview">
								<label for="attendeestwo">Number of attendees between 5 and 12 years old<span class="required">*</span>:</label>
                <div>
								  <input type="text" name="attendeestwo" id="attendeestwo" size="40"  maxlength="60" value="<?php echo $attendeestwo; ?>"/><br/><span class = "error"><?php echo " " . $attendeestwoErr;?></span>
								</div>
						</div>
						<div class="gridview">
								<label for="attendeesthree">Number of attendees 13 to 17 years old<span class="required">*</span>:</label>
								<div>
								  <input type="text" name="attendeesthree" id="attendeesthree" size="40"  maxlength="60" value="<?php echo $attendeesthree; ?>"/><br/><span class = "error"><?php echo " " . $attendeesthreeErr;?></span>
								</div>
						</div>
						<div class="gridview">
							<label for="attendeesfour">Number of attendees 18+ years old<span class="required">*</span>:</label>
							<div>
							  <input type="text" name="attendeesfour" id="attendeesfour" size="40"  maxlength="60" value="<?php echo $attendeesfour; ?>"/><br/><span class = "error"><?php echo " " . $attendeesfourErr;?></span>
							</div>
						</div>
					</div>
						<div class="gridview">
							<label for="otherevents">Other events you want to be offered:</label>
							<div>
							  <textarea name="otherevents" id="otherevents" rows="5" cols="41" value="<?php echo $otherevents; ?>"></textarea>
							</div>
						</div>
						<div class="signupnewsletter">
							<input type="checkbox" name="newsletter" id="newsletter" value="Desert" checked/> <label for="newsletter">Signup for newsletter</label>
						</div>
					</div>
				  </fieldset>
						<input type="submit" value="Submit">
				</form>
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
