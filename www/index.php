<!DOCTYPE HTML>
<html>
<head>
	<title>University course registration system</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header">
			<div class="logo">
				<span class="icon fa-gem"></span>
			</div>
			<div class="content">
				<div class="inner">
					<h1>University course registration system CEI111018</h1>
					<p>This website can be used to check students course materials, course related information, etc.</p>
				</div>
			</div>
			<nav>
				<ul>
					<li><a href="#intro">Intro</a></li>
					<li><a href="#work">Work</a></li>
					<li><a href="#about">About Me</a></li>
					<li><a href="#contact">Contact</a></li>
					<li><a href="#search">Search</a></li>
				</ul>
			</nav>
		</header>

		<!-- Main -->
		<div id="main">

			<!-- Intro -->
			<article id="intro">
				<h2 class="major">Intro</h2>
				<span class="image main"><img src="images/pic01.jpg" alt="" /></span>
				<p>Welcome to the University Registration System. Our registration system aims to provide students, faculty, and administrators with a convenient, efficient, and secure platform for managing all registration-related activities. Thank you for using our University Registration System, and we wish you all the best in your academic endeavors!</p>
			</article>

			<!-- Work -->
			<article id="work">
				<h2 class="major">Work</h2>
				<span class="image main"><img src="images/pic02.jpg" alt="" /></span>
				<p>The primary function of this webpage is to facilitate students and teachers in querying course lists and student information to enhance the convenience of course selection for students.</p>
			</article>

			<!-- About -->
			<article id="about">
				<h2 class="major">About Me</h2>
				<span class="image main"><img src="images/pic03.jpg" alt="" /></span>
				<p>Hello everyone, my name is Lin Yan-Cheng. I'm from Kaohsiung, and I am currently a student in the CSIE Department at Pingtung University.

					I am a diligent person who is always willing to take on new challenges and learn new things. I believe that continuous learning and constant improvement are the keys to success.
					
					By creating this website, I hope to enhance my technical skills and look forward to learning and growing together with all of you. Thank you!</p>
			</article>

			<!-- Contact -->
			<article id="contact">
				<h2 class="major">Contact</h2>
				<form method="post" action="#">
					<div class="fields">
						<div class="field half">
							<label for="name">Name</label>
							<input type="text" name="name" id="name" />
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" />
						</div>
						<div class="field">
							<label for="message">Message</label>
							<textarea name="message" id="message" rows="4"></textarea>
						</div>
					</div>
					<ul class="actions">
						<li><input type="submit" value="Send Message" class="primary" /></li>
						<li><input type="reset" value="Reset" /></li>
					</ul>
				</form>
				<ul class="icons">
					<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
				</ul>
			</article>

			<!-- Search -->
			<article id="search">
				<h2 class="major">Search System</h2>

				<section>
					<nav id="menu">
						<ul class="links">
							<p>Insert the DataBase name</p>
							<div>
								<?php
									$error = "";
									if ($_SERVER["REQUEST_METHOD"] === "POST") {
										if (isset($_POST['search'])) {
											$keyword = $_POST['search'];
											if ($keyword === "Query1") {
												header("Location: Query1.php");
												exit();
											} elseif ($keyword === "Query2") {
												header("Location: Query2.php");
												exit();
											} elseif ($keyword === "Query3") {
												header("Location: Query3.php");
												exit();
											} elseif ($keyword === "Query4") {
												header("Location: Query4.php");
												exit();
											} elseif ($keyword === "Query5") {
												header("Location: Query5.php");
												exit();
											} else {
												$error = "Input error, please re-enter";
											}
										}
									}
								?>
								
								<form method="post" action="">
									<input type="text" name="search" placeholder="Insert word..." class="search-input" />
									<br/>
									<button type="submit" class="search-button">Search</button>
									<div class="error-message"><?php echo $error; ?></div>
								</form>
								<li><a href="Query1.php">Show Student information</a></li>
								<li><a href="Query2.php">The teacher's expertise</a></li>
								<li><a href="Query3.php">The total credits taken by the student</a></li>
								<li><a href="Query4.php">The student's class schedule</a></li>
								<li><a href="Query5.php">The number of students taught by each teacher</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</section>
				</article>
			</div>

			<!-- Footer -->
			<footer id="footer">
				<!--<p class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>-->
			</footer>

		</div>

		<!-- BG -->
		<div id="bg"></div>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
	</html>
