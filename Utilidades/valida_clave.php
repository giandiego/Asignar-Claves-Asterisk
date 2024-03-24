#!/usr/bin/php -q
<?php

	require('/var/lib/asterisk/agi-bin/phpagi/phpagi.php');

	//Usamos mysqli
	$conexion = new mysqli("localhost","edita_pin","asinar_claves123","asterisk");

	$agi=new AGI();

	$clave=$_SERVER['argv'][1];
	$anexo=$_SERVER['argv'][2];
	$permiso=$_SERVER['argv'][3];

	$cConsulta = "select anexo,clave,tipo,".$permiso." from claves where clave = '".$clave."'";
	$result = $conexion -> query($cConsulta);
	$result = $result -> fetch_assoc();

	$agi -> Noop($cConsulta);

	if ($result['clave']!="") {

		if ($result['tipo']=="1" and $result['anexo']==$anexo and $result[$permiso]=="1") {
			//ok
			$agi -> set_variable("Continua","1");
		}

		elseif ($result['tipo']==="0" and $result[$permiso]=="1") {
			//ok
			$agi -> set_variable("Continua","1");
		}

		elseif ($result['anexo']!=$anexo and $result['tipo']=="1") {
			//No tiene permisos
			$agi -> set_variable("Continua","2");
		}

		elseif ($result[$permiso]=="0") {
			//No tiene permisos
			$agi -> set_variable("Continua","2");
		}		
	}
	else{
		//clave incorreca
		$agi -> set_variable("Continua","3");
	}