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
	</script>
	<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#slideshow').cycle({ 
			fx:     'scrollLeft', 
			speed:  'fast',
			prev:   '#prev', 
			next:   '#next', 
			timeout: 8000, 
			pager:  '#nav', 
			pagerAnchorBuilder: function(idx, slide) { 
				var asd = new Array("Audiovisual","Ahorro de Energ&iacute;a","Utilidades", "Seguridad", "Comunicaciones");
				return '<li><a href="#"><img src="images/icon_' + idx + '.png" /></a><br><br><span style="cursor:pointer">' + asd[idx] + '</span></li>' ;
			} 
		});
	});
	</script>
</head>
<body class="bg">
	<div class="container_12">
		<div class="grid_12" id="interna">
			<?php include("includes/header.php") ?>
		</div>
	</div>
	<div id="servicios">
		<div class="container_12">
			<div class="grid_12">
				<div  style="width:100%; height:540px; position:relative;text-align:center">
					<ul id="nav"></ul>
					<img src="images/sep.png" style="margin-top:20px">
					<a href="#" id="prev"><img src="images/arrow_prev.png"></a>
					<div id="slideshow" style="text-align:left">
						<div class="slide">
							<h1>Audiovisual</h1>
							<ul>
								<li>- Media Center (Servidor central de audiovisuales para toda la instalaci&oacute;n).</li>
								<li>- Sonido Ambiente.</li>
								<li>- Home Theater: control centralizado de varios equipos e interacci&oacute;n con smartphones y tablets.</li>
								<li>- Smart TV.</li>
							</ul>
						</div>
						<div class="slide">
							<h1>Ahorro de Energ&iacute;a</h1>
							<ul>
								<li>- Racionalizaci&oacute;n de cargas el&eacute;ctricas por medio de dispositivos que permitan la conexi&oacute;n o desconexi&oacute;n de equipos en funci&oacute;n de la simultaneidad de cargas.</li>
								<li>- Encendido y apagado general de la iluminaci&oacute;n de la vivienda y en puntos con detecci&oacute;n de presencia o mandos inal&aacute;mbricos.<li>
									<li>- Iluminaci&oacute;n zonificada con detectores de presencia o en funci&oacute;n de la luz .</li>
									<li>- Control de la climatizaci&oacute;n en cuanto a la temperatura, horario y presencia detectada.</li>
									<li>- Manejo de curvas de demanda para proporcionar informaci&oacute;n acerca de consumos y costos de las distintas tarifas del agua y electricidad.</li>
								</ul>
							</div>
							<div class="slide">
								<h1>Utilidades</h1>
								<ul>
									<li>- Control del Riego<li>
										<li>- Accionamiento remoto del filtro de piscina<li>
											<li>- Aspiraci&oacute;n Central<li>
												<li>- Encendido de hornos, cafeteras y otros aparatos desde el control (smartphones, tablets y otros)<li>
												</ul>
											</div>
											<div class="slide">
												<h1>Seguridad</h1>
												<ul>
													<li>Patrimonial: Control de acceso a un lugar por reconocimiento o identificaci&oacute;n del usuario.</li>
													<li>Sistema de detecci&oacute;n de intrusos con detectores de presencia, alarmas ac&uacute;sticas, grabaciones en video Evasi&oacute;n de intrusos:
														<ul>
															<li>- Mediante simuladores de presencia que ejecutan acciones cotidianas automaticamente</li>
															<li>- Circuito Cerrado de Televisi&oacute;n (CCTV)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Video porteros&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Cerraduras Electromagn&eacute;ticas</li>
															<li>- Eventos de Emergencia -Sistemas de prevenci&oacute;n de incendios</li>
															<li>- Detectores de fugas de gas, o agua, permitiendo el aviso y control de las mismas.</li>
															<li>- Detecci&oacute;n del grado de toxicidad de un ambiente por fuego o humo.</li>
														</ul>
													</li>
												</ul>
											</div>
											<div class="slide">
												<h1>Comunicaciones</h1>
												<ul>
													<li>A trav&eacute;s de Smartphones, tablets y/o PC se podr&aacute;n llevar a cabo las siguientes acciones, desde cualquier lugar del mundo:</li>
													<li>Control y monitoreo de toda la instalaci&oacute;n dom&oacute;tica: encender/apagar aire acondicionado, abrir/cerrar ventanas, prender/apagar el filtro de la pileta, verificaci&oacute;n de luces encendidas, etc.</li>
												</ul>
											</div>
										</div>
										<a href="#" id="next"><img src="images/arrow_next.png"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="container_12">
							<div class="grid_12">
								<?php include("includes/footer.php") ?>
							</div>
						</div>
					</body>
					</html>