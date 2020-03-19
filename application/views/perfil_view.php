<!-- Hojas de estilo -->
<link rel="stylesheet" href="<?php echo asset_url();?>css/jquery.Jcrop.min.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/perfil.css" >
<!-- Librerias JS -->
<script src="<?php echo asset_url();?>js/jquery.Jcrop.min.js"></script>
<style>
	/* Color of invalid field */
.has-error .control-label,
.has-error .help-block,
.has-error .form-control-feedback {
    color: #a94442;
}

/* Color of valid field */
.has-success .control-label,
.has-success .help-block,
.has-success .form-control-feedback {
    color: #3c763d;
}
</style>
<section>

	<div class="row" >
        <div class="6u 12u$(small)" id="leftPanel">
            <div class="row">
			<?php if($datos_cliente!=""){
					foreach($datos_cliente as $cliente){
			?>
                <div class="12u">
        				<img src="http://lorempixel.com/200/200/abstract/1/" alt="Texto Alternativo" class="img-circle img-thumbnail">
        				<!--<h2>Gopinath Perumal</h2>-->
        				<h2><?php echo $cliente->nombre.' '.$cliente->apellidos; ?></h2>
						<p><?php echo $cliente->sobre_ti; ?></p>
        		</div>
            </div>
        </div>
        <div class="6u 12u$(small)" id="rightPanel">
            <div class="row">
				<div class="12u">
                    <?php
                            echo $this->session->flashdata('error_form');
                    ?>
					<form name="perfil_data" id="perfil_data" method="post" autocomplete="off" action="<?php echo base_url();?>Perfil/salva_cambios" enctype="multipart/form-data" >
						<h2>Edita tu perfil.<small>Es sencillo, intentalo.</small></h2>
						<hr class="colorgraph">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="first_name" id="first_name" class="form-control input-md" placeholder="Nombre" tabindex="1" value="<?php echo $cliente->nombre; ?>" ><?php echo form_error('first_name');?>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="last_name" id="last_name" class="form-control input-md" placeholder="Apellidos" tabindex="2" value="<?php echo $cliente->apellidos; ?>" ><?php echo form_error('last_name');?>
								</div>
							</div>
						</div>
						<div class="form-group">
							<input type="email" name="email" id="email" class="form-control input-md" placeholder="Email Address" tabindex="4" value="<?php echo $cliente->correo; ?>"><?php echo form_error('email');?>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="password" name="password" id="password" class="form-control input-md" placeholder="Password (1 may,1 min,1num)" tabindex="5"><?php echo form_error('password');?>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-md" placeholder="Confirmar Password" tabindex="6"><?php echo form_error('password_confirmation');?>
								</div>
							</div>
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="form-group">
							     <input type="password" name="new_pass" id="new_pass" class="form-control input-md" placeholder="Nueva Contraseña" tabindex="7">
						        </div>
						    </div>
						</div>
						<hr class="colorgraph">
						<div class="row">
                            <input type="hidden" id="token" name="token" value="<?=$token?>">
							<div class="col-xs-12 col-md-6"><button type="submit" class="btn special fit small">Salvar</button></div>
                            <div class="col-xs-12 col-md-6"><a href="<?php echo base_url(); ?>" class="button fit small">Cancelar</a></div>
						</div>
					</form>
				</div>
					<?php }//end-foreach
						}//end-if
					?>
			</div>
		</div>
    </div>
</section>
</div>
	</div>
<script src="<?php echo asset_url(); ?>js/validate/jquery.validate.min.js"></script>
<script src="<?php echo asset_url(); ?>js/custom.js"></script>
<script>

        // $('#target').Jcrop();
</script>
