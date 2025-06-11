<?php 
$msg = false; $content = ''; $type = ''; $is_ok = false; $envio = false;

if($_POST) {
	extract($_POST);

	$to  = 'comercial@domopy.com';

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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>DomoPy - Instalaciones Dom&oacute;ticas e Imn&oacute;ticas</title>
<link rel='index' title='Domopy - Domótica en Paraguay' href='http://www.domopy.com' />
<meta name="description" content="Domótica en Paraguay" />
<meta name="keywords" content="paraguay, paraguay domótica, domótica, domótica del paraguay, domo paraguay, domótica, domótica en paraguay, paraguay, domótica paraguay" />
<meta name="robots" content="index,follow">
<link rel="canonical" href="http://www.domopy.com/" />
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/960.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/cufon/1.09i/cufon-yui.js" type="text/javascript"></script>
	<script src="js/HelveticaNeueLT_Com_35_Th_250.font.js" type="text/javascript"></script>
	<script type="text/javascript">
	Cufon.replace('body', {hover: true});
	Cufon.replace('#submit_this', {hover: true});
	</script>
	<style type="text/css">
		label {
			width:250px;
			padding:8px;
			margin:5px;
		}
		input, textarea {
			width:250px;
			padding:8px;
			margin:5px;
			border:1px solid #ccc;
		}
		textarea {
			width:300px;
		}
		input#submit_this {
			background:#2088C9;
			-webkit-border-radius:10px;
			-moz-border-radius:10px;
			border-radius:10px;
			width:100px;
			border:0;
			color:#fff;
			font-weight: bold;
			margin-left:15px;
			cursor: pointer
		}
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
</head>
<body class="bg">
	<div class="container_12">
		<div class="grid_12">
			<?php include("includes/header.php") ?>
			<div id="interna">
				<h2>Contacto</h2>

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
					</ul>
					<p>&nbsp;</p>
					<p>&nbsp; </p>
					<p>&nbsp;</p>
                    
      
  <form action="contacto.php" method="post">
  
<input type="submit" value="Enviar" />
</form>

<?php 
$fecha=date("d-m-y");
$hora=date("H-i-s");
$detino="comercial@domopy.com";
$asunto="envio de formulario";
$desde= 'From: ' .$_POST[Nombre];
$comentario="
\n
Nombre: $_POST[Nombre]\n
Empresa: $_POST[Empresa]\n
Teleono: $_POST[Teleono]\n
Emai: $_POST[Email]\n
Su mensaje: $_POST[texto]\n
Enviado: $fecha a las $hora\n
\n
";
mail($detino, $asunto, $comentario, $desde);

?>
               
					<ul>
					  <li></li>
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
				<?php include("includes/footer.php") ?>
		  </div>
		</div>
	</div>
	<script type="text/javascript">
	$(function() {
		Cufon.now();
		lugares = ["media_center", "incendios", "iluminacion", "escenas", 
		"luces", "cortinas", "gas", "octv", "clima", "accesos"];
		$.each(lugares, function(key,value){
			$("." + value + "_spot").hover(function(){
				$("." + value).toggle("fast");
			});
		});
	});
	</script>
</body>
</html>
