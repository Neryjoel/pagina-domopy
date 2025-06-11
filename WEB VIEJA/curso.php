
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
  <title>DomoPy - Curso de Domotica</title>

  
  
  <link rel="index" title="Domopy - Dom贸tica en Paraguay" href="http://www.domopy.com">

  
  <meta name="description" content="Dom贸tica en Paraguay">

  
  <meta name="keywords" content="paraguay, paraguay dom贸tica, dom贸tica, dom贸tica del paraguay, domo paraguay, dom贸tica, dom贸tica en paraguay, paraguay, dom贸tica paraguay">

  
  <meta name="robots" content="index,follow">

  
  <link rel="canonical" href="http://www.domopy.com/">

  
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
</head><body class="bg">
<div class="container_12">
<div class="grid_12">
<div class="header"> <a href="/" class="logo"><img src="images/logo.gif"></a>
<ul class="nav">
  <li><a href="index.php">Inicio</a></li>
  <li><a href="empresa.php">La Empresa</a></li>
  <li><a href="servicios.php">Servicios</a></li>
  <li><a href="video.php">Multimedia</a></li>
  <li><a href="contacto.php" class="active">Contacto</a></li>
  <li><a href="obras.php">Obras</a></li>
</ul>
</div>
<div id="interna">
<h2>Inscripcion Curso de Domotica e Inmotica - Jueves 15 de Setiembre del 2016<br>
</h2>
<form action="curso.php" method="post">
  <ul>
    <li> <label for="name">Nombre *</label><br>
      <input name="name" size="50" class="required" type="text"> </li>
    <li> <label for="Empresa">Empresa *</label><br>
      <input name="Empresa" size="50" class="required" type="text"> </li>
    <li> <label for="Telefono">Telefono *</label><br>
      <input name="Telefono" size="50" class="required" type="text"> </li>
    <li> <label for="Email">E-mail *</label><br>
      <input name="Email" size="50" class="required" type="text"> </li>
  </ul>
&nbsp;&nbsp;&nbsp;&nbsp;
  <ul>
  </ul>
  <ul>
    <li>
      <label for="message">&iquest;Por que quiere realizar este Curso?</label><br>
      <textarea cols="50" name="message" rows="6" class="required"></textarea>
    </li>
    </ul>
  <p>&nbsp;</p>
  
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
Teleono: $_POST[Telefono]\n
Email: $_POST[Email]\n
Su mensaje: $_POST[texto]\n
Enviado: $fecha a las $hora\n
\n
";
mail($detino, $asunto, $comentario, $desde);
if ($envio) {
		$msg = true;
		$content = "Sus datos han sido enviados con exito. Un representante se comunicar&aacute; con Usted en breve.";
		$type = "success";
	}

?>
  
  
<input type="submit" value="Enviar este formulario" />
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
<div style="margin-bottom: -50px; width: 100%; float: left;">
<center><img src="images/logos.png" usemap="#Map"><br>
<br>
<br>
<br>
</center>
<map name="Map" id="Map">
<area shape="rect" coords="-8,1,63,55" href="http://www.knx.org" target="_blank">
<area shape="rect" coords="82,2,150,42" href="http://www.fibaro.com" target="_blank">
<area shape="rect" coords="163,1,240,44" href="http://eelectron.com" target="_blank">
<area shape="rect" coords="250,2,333,43" href="http://www.hdlautomation.com/" target="_blank">
<area shape="rect" coords="340,1,408,54" href="http://www.isde-ing.com/" target="_blank">
<area shape="rect" coords="419,4,471,44" href="http://www.globalcache.com/" target="_blank">
<area shape="rect" coords="498,4,570,39" href="http://www.iluflex.com.br/" target="_blank">
<area shape="rect" coords="590,4,649,45" href="http://www.eissound.com" target="_blank">
<area shape="rect" coords="673,4,754,57" href="http://www.youtube.com/watch?v=9sDu9RWUKJw" target="_blank">
</map>
</div>
<div style="width: 100%; float: left; margin-top: 75px;">
<div style="float: left; width: 50%; height: 150px;">
<p class="asd">DomoPy<br>
Instalaciones Dom髏icas e Inm髏icas<br>
Av. Sant韘imo Sacramento 1047 - Tel.: 603-979<br>
<a href="mailto:comercial@domopy.com">comercial@domopy.com</a><br>
Asunci髇, Paraguay2016 . Todos los derechos
reservados.</p>
</div>
<div style="float: right; width: 20%; height: 75px;">
<p>Seguinos en:</p>
<ul class="social">
  <li><a href="https://www.facebook.com/pages/DomoPy/145841828771359" title="Seguinos en Facebook"><img src="images/logo_fb.png"></a></li>
  <li><a href="https://twitter.com/DomoPy" title="Seguinos en Twitter"><img src="images/logo_tw.png"></a></li>
  <li><a href="#" title="Seguinos en YouTube"><img src="images/logo_yt.png"></a></li>
</ul>
</div>
</div>
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
</body></html>