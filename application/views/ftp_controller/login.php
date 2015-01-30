	<div class="login">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Login FTP</h3>
			</div>
			<div class="panel-body">
				<?php 
					echo form_open('ftp_controller/connect', array(
						"class" => "form-field"
					));
				?>
				<?php
					echo form_label('Hostname', 'hostname');
					echo form_input(array(
						"name" => "hostname",
						"class" => "form-control",
						"value" => set_value("hostname", "")
					));
					echo form_error("hostname");

					echo form_label('Port', 'port');
					echo form_input(array(
						"name" => "port",
						"class" => "form-control",
						"value" => set_value("port", "21")
					));
					echo form_error("hostname");

					echo form_label('Username', 'username');
					echo form_input(array(
						"name" => "username",
						"class" => "form-control",
						"value" => set_value("username", "")
					));
					echo form_error("username");

					echo form_label('Password', 'password');
					echo form_password(array(
						"name" => "password",
						"class" => "form-control"
					));
					echo form_error("password");
				?>
			</div>
			<div class="panel-footer">
				<?php 
					echo form_submit(array(
						"value" => "Login",
						"class" => "btn btn-primary btn-lg",
						"onclick" => "loading_show()"
					));
				?>
					<div id="loading" class="bubblingG bubblingG-hidden">
						<span id="bubblingG_1">
						</span>
						<span id="bubblingG_2">
						</span>
						<span id="bubblingG_3">
						</span>
					</div>
			</div>
			<?php if ($this->session->flashdata('erro')): ?>
				<div class="panel-footer"><div class="alert alert-danger"><?php echo $this->session->flashdata('erro'); ?></div></div>
			<?php endif ?>
			<?php
				echo form_close();
			 ?>
		 </div>
	</div>

	<script>
	function loading_show () {
		$("#loading").toggleClass('bubblingG-hidden');
	}
	</script>