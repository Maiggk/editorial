<!-- Content -->
					<section>
						<header class="main">
							<h2>Nueva Publicación</h2>
							<?php if($this->session->flashdata('validacion_error'))
										{
										echo '<p>'.$this->session->flashdata('validacion_error').'</p>';
										}
							?>
						</header>

						<!-- Form -->
							<form method="post" action="<?php echo base_url();?>publicaciones/salvar_publicacion" enctype="multipart/form-data" >
								<div class="row uniform">
									<!-- Break -->
									<div class="12u 12u$(xsmall)">
										<input class="form-control" type="text" name="titulo_pub" id="titulo_pub" placeholder="Titulo" />
										<?php echo form_error('titulo_pub'); ?>
									</div>
									<!-- Break -->
									<div class="12u 12u$(xsmall)">
										<input class="form-control" type="text" name="sub_pub" id="sub_pub" placeholder="Subtitulo" />
										<?php echo form_error('sub_pub'); ?>
									</div>
									<!-- Break -->
									<div class="12u 12u$(xsmall)">
										<input class="form-control" type="file" name="imagen_pub"  >
									</div>
									<!-- Break -->
									<div class="12u$ 12u$(xsmall) form-group <?php echo (strlen(form_error('category')) > 0 ? 'has-error' : ''); ?>">
										<div class="select-wrapper">
											<select name="category" id="category">
												<option value=""><center>- Categoria -<center></option>
												<?php foreach($categorias as $categoria){
													echo '<option value="'.$categoria->id_categoria.'">'.$categoria->nombre_categoria.'</option>';
												 } ?>
											</select>
										</div>
										<?php echo form_error('category'); ?>
									</div>
									<!-- Break -->
									<div class="12u$ 12u$(xsmall) form-group <?php echo (strlen(form_error('bodymessage')) > 0 ? 'has-error' : ''); ?>">
										<textarea style="resize:vertical;" name="bodymessage" id="bodymessage" placeholder="" rows="8"></textarea>
										<?php echo form_error('bodymessage'); ?>
									</div>
									<!-- Break -->
									<div class="12u$">
										<?php echo $scriptCaptcha; ?>
										<?php echo $recaptcha; ?>
									</div>
									<!-- Break -->
									<div class="6u$ 12u$(xsmall)">
										<ul class="actions fit">
											<li><input class="button fit special" type="submit" value="Publicar"></li>
											<li><a class="button fit" href="<?php echo base_url();?>" type="button">Cancelar</a></li>
										</ul>
									</div>
									<input name="token" type="hidden" value="<?php echo $token; ?>">
								</div>
							</form>

						<hr class="major">

					</section>

			</div>
		</div>
