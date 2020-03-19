<!DOCTYPE HTML>
<!--
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="es">
	<head>
		<title>Editorial <?= (isset($title_page)) ? substr($title_page,0,25):" ";?></title>
		<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.png" sizes="16x16" type="image/png">
		<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/x-icon"/>
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="<?php echo asset_url();?>bootstrap/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo asset_url();?>css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <!--Jquery Requerido-->
        <script src="<?php echo asset_url(); ?>js/jquery.min.js"></script>
		<script type="text/javascript">
			var base_url = '<?php echo base_url(); ?>';
		</script>
	</head>
	<body>
			<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">
                            <ul class="nav navbar-nav navbar-right">
                                <?php
                                    if(!$this->session->userdata('is_logued_in')){?>
                                    <?php }else{ ?>
                                        <p>Hola <?php echo anchor('Perfil',$this->session->userdata('username'));?></p>
                                    <?php }
                                    ?>
                            </ul>
							<!-- Header -->
								<header id="header">
									<a href="<?php echo base_url(); ?>" class="logo"><strong>Editorial</strong></a>
									<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
									</ul>
								</header>
