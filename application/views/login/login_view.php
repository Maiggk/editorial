<!--
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
		<title>Editorial | Ingreso</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<link rel="icon" href="<?php echo base_url();?>assets/images/favicon.png" sizes="16x16" type="image/png">
		<link rel="icon" href="<?php echo base_url();?>assets/images/favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico" type="image/x-icon">
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css">	
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
	<body class="">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="<?php echo base_url();?>" class="logo"><strong>Editorial</strong></a>
									<ul class="icons">
									</ul>
								</header>

							<!-- Content -->
								<section>
									<header class="main">
										<h1><center>Ingreso</center></h1>
										<?php if($this->session->flashdata('usuario_incorrecto')){?>
											<p><?php echo $this->session->flashdata('usuario_incorrecto'); ?></p>
										<?php } ?>
									</header>
									
									<!-- Form -->
										<form method="post" action="<?php echo base_url();?>login/login/accesso">
											<div class="row uniform">
												<div class="12u$ 12u$(xsmall) form-group <?php echo (strlen(form_error('demoemail')) > 0 ? 'has-error' : ''); ?>">
													<input class="form-control" type="email" name="demoemail" id="demoemail" placeholder="Email" value="<?php echo set_value('demoemail'); ?>" />
													<?php echo form_error('demoemail'); ?>
												</div>
												<div class="12u 12u$(xsmall) form-group <?php echo (strlen(form_error('wordpass')) > 0 ? 'has-error' : ''); ?>">
													<input class="form-control" type="password" name="wordpass" id="wordpass" placeholder="Password" />
													<?php echo form_error('wordpass'); ?>
												</div>
												<!-- Break -->
												<div class="6u$ 12u$(xsmall)">
													<ul class="actions fit">
														<li><input class="button fit special" type="submit" value="Acceder"></li>
														<li><a class="button fit" href="<?php echo base_url();?>" type="button">Home</a></li>
													</ul>
												</div>
												<input name="token" type="hidden" value="<?php echo $token; ?>">
											</div>
										</form>

									<hr class="major">

								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar" class="">
						<div class="inner">

							<!-- Search -->
								<section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search">
									</form>
								</section>

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="<?php echo base_url(); ?>">Homepage</a></li>
										<li><a href="<?php echo base_url(); ?>generic">Generic</a></li>
										<li><a href="<?php echo base_url(); ?>elements">Elements</a></li>
										<li>
											<span class="opener">Submenu</span>
											<ul>
												<li><a href="#">Lorem Dolor</a></li>
												<li><a href="#">Ipsum Adipiscing</a></li>
												<li><a href="#">Tempus Magna</a></li>
												<li><a href="#">Feugiat Veroeros</a></li>
											</ul>
										</li>
										<li><a href="#">Etiam Dolore</a></li>
										<li><a href="#">Adipiscing</a></li>
										<li>
											<span class="opener">Another Submenu</span>
											<ul>
												<li><a href="#">Lorem Dolor</a></li>
												<li><a href="#">Ipsum Adipiscing</a></li>
												<li><a href="#">Tempus Magna</a></li>
												<li><a href="#">Feugiat Veroeros</a></li>
											</ul>
										</li>
										<li><a href="#">Maximus Erat</a></li>
										<li><a href="#">Sapien Mauris</a></li>
										<li><a href="#">Amet Lacinia</a></li>
									</ul>
								</nav>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Ante interdum</h2>
									</header>
									<div class="mini-posts">
										<article>
											<a href="#" class="image"><img src="images/pic07.jpg" alt=""></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic08.jpg" alt=""></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic09.jpg" alt=""></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
									</div>
									<ul class="actions">
										<li><a href="#" class="button">More</a></li>
									</ul>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Get in touch</h2>
									</header>
									<p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
									<ul class="contact">
										<li class="fa-envelope-o"><a href="#">information@untitled.tld</a></li>
										<li class="fa-phone">(000) 000-0000</li>
										<li class="fa-home">1234 Somewhere Road #8254<br>
										Nashville, TN 00000-0000</li>
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">© Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
								</footer>

						</div>
					<a href="#sidebar" class="toggle">Toggle</a></div>

			</div>

		<!-- Scripts -->
			<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
			<script src="<?php echo base_url();?>assets/js/skel.min.js"></script>
			<script src="<?php echo base_url();?>assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="<?php echo base_url();?>assets/js/main.js"></script>

	
</body>
</html>