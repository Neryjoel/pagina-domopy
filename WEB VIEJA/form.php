<?php 

$msg = false; $content = ''; $type = ''; $is_ok = false; $envio = false;

if($_POST) {
	extract($_POST);

	$to  = 'omar@oniria.com.py';

	$subject = 'Contacto enviado desde la web';

	$email = '
	<html>
	<body>
	<p>Contacto enviado desde la web</p><br />
	<p>Enviado el: '.date('d/m/Y H:i').'</p><br />
	<p>Nombre: '.$name.'</p><br />
	<p>E-mail: '.$email.'</p><br />
	<p>Mensaje:</p>
	'.$message.'
	</body>
	</html>
	';

	if(!$name == "" or !$email == "" or !$message == "") {
		$is_ok = true;
	}

	if($is_ok) {
		$headers		= array();
		$headers[]	= "MIME-Version: 1.0";
		$headers[]	= "Content-type: text/html; charset=utf-8";
		$headers[]	= "X-Mailer: PHP/".phpversion();

		$envio = mail($to, $subject, $email, implode("\r\n", $headers));
	}

	if ($envio) {
		$msg = true;
		$content = "Sus datos han sido enviados con exito. Un representante se comunicar&aacute; con Usted en breve.";
		$type = "success";
	} else {
		$msg = true;
		$content = "No se pudieron enviar sus datos. Verifique la informaci&oacute;n e intente de nuevo.";
		$type = "error";
	}
}
?>

<style type="text/css">
.alert-success {
	padding:10px;
	color: #468847;
	background-color: #dff0d8;
	border-color: #d6e9c6;
}

.alert-error {
	padding:10px;
	color: #b94a48;
	background-color: #f2dede;
	border-color: #eed3d7;
}
</style>

<?php if ($msg) { ?>
<div class="alert-<?php echo $type; ?>">
	<?php echo $content; ?>
</div>
<?php } ?>

<form method="post">
	<ul>  
		<li>
			<label for="name">Nombre *</label><br /><div class="clear" ></div>
			<input name="name" size="50" type="text" class="required" />
		</li>
		<li>
			<label for="email">E-mail *</label><br /><div class="clear" ></div>
			<input name="email" size="50" type="text" class="required" />
		</li>					
		<li>
			<label for="message">Su mensaje *</label><br /><div class="clear" ></div>
			<textarea cols="50" name="message" rows="6" class="required"></textarea>
		</li>
		<li><input name="commit" type="submit" value="Enviar" id="submit_this" /></li>
	</ul>
</form>

<script type="text/javascript">
$(document).ready(function(){
	$("#submit_this").click(function(){
		var required = $('form').find('.required');
		var i = 0;
		$.each(required, function(){
			if($(this).val() == "") i++;
		});
		if(i > 0){
			alert("Complete los campos requeridos.");
			return(false);
		} else {
			$('form').submit();
		}
	});
});
</script>