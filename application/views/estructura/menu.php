<!-- Sidebar -->
	<div id="sidebar">
		<div class="inner">

			<!-- Search -->
				<section id="search" class="alt">
					<form method="post" action="#">
						<input type="text" name="query" id="query" placeholder="Search" />
					</form>
					<?php
					if(!$this->session->userdata('is_logued_in')){?>
						<a href="<?php echo base_url();?>login" class="button small"><span>Ingresar</span></a>
						<a href="#" class="button special small"><span>Registrarse</span></a>
					<?php }else{ ?>
						<a href="<?php echo base_url();?>login/logout" class="button small"><span>Cerrar Sesión</span></a>
					<?php }
					print_r($this->session->all_userdata());
					?>
				</section>
			<!-- Menu -->
				<nav id="menu">
					<header class="major">
						<h2>Menu</h2>
					</header>
					<ul>
						<li><a href="<?php echo base_url(); ?>">Homepage</a></li>
						<li><a href="<?php echo base_url(); ?>principal/generic">Generic</a></li>
						<li><a href="<?php echo base_url(); ?>principal/elements">Elements</a></li>
						<?php
							if($this->session->userdata('is_logued_in')){ ?>
									<li><a href="<?php echo base_url(); ?>Publicaciones">Nueva Publicación</a></li>
							<?php } ?>
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
						<article id="calendario">
							<?php echo $this->calendar->generate();?>
						</article>
						<article>
							<a href="#" class="image"><img src="<?php echo asset_url(); ?>images/pic07.jpg" alt="" /></a>
							<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
						</article>
						<article>
							<a href="#" class="image"><img src="<?php echo asset_url(); ?>images/pic08.jpg" alt="" /></a>
							<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
						</article>
						<article>
							<a href="#" class="image"><img src="<?php echo asset_url(); ?>images/pic09.jpg" alt="" /></a>
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
						<li class="fa-home">1234 Somewhere Road #8254<br />
						Nashville, TN 00000-0000</li>
					</ul>
				</section>

			<!-- Footer -->
				<footer id="footer">
					<p class="copyright">&copy; Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
				</footer>

		</div>
	</div>
	<script>
		$(document).ready(function(){
				// $("#calendario").load("<?php echo base_url();?>login/calendario");
				// $("#calendario table th a").click(function(){
					// $("#calendario").load("<?php echo base_url();?>login/calendario");
				// });
		});
	</script>
