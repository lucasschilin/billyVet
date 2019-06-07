<?php
	echo "<script> alert('Registro indisponível, contate nossa equipe'); </script>";
	echo "<script>window.location.href='../../../prog_g1/desenv/visao/lstRegistro.php?id_internacao=". $registro->getid_internacao()."';</script>";
	//echo "<script>window.location.href='../../../prog_g1/desenv/visao/lstRegistro.php?id_internacao= 52';</script>";
?>
