<?php 
	$sections = array("index.php", "empresa.php", "servicios.php", "video.php", "contacto.php", "obras.php");
	$names = array("Inicio", "La Empresa", "Servicios", "Multimedia", "Contacto", "Obras");
	$file = basename($_SERVER['SCRIPT_FILENAME']);
	$active = 'class="active"';
?>
<div class="header">
	<a href="/" class="logo"><img src="images/logo.gif"></a>
	<ul class="nav">
		<?php $i=0;foreach ($sections as $section): ?>	
			<li><a href="<?php echo $section ?>" <?php if ($file == $section) echo $active ?>><?php echo $names[$i] ?></a></li>
		<?php $i++;endforeach ?>
	</ul>
</div>
