<html>
	<head>
		<title>Mastermind</title>
	</head>
	<body>
		<h1>Bienvenido al Mastermind</h1></br>
		<form action="masterControllerComprobar" method="get">
			<h3>Introduce un codigo</h3></br>
			<br/>

			<?php 
				$hist[]=Session('historial');

				if ($hist!="") {
					foreach ($hist as $historial) {
						if ($historial!="") {
							foreach ($historial as $linea) {
								echo $linea[0];
								echo "Aciertos: ".$linea[1];
								echo "Candidatos".$linea[2];
								echo "<br/>";
							}
						}
					}
				}
			?>
			@if(Session::get('intentos')>0)
				@for($i=0;$i < Session::get('clave');$i++)
					<select name="selectColores{{$i}}">
					  	<option value="azul">Azul</option>
					  	<option value="amarillo">Amarillo</option>
					  	<option value="verde">Verde</option>
					  	<option value="rojo">Rojo</option>
					  	<option value="azulClaro">Azul Claro</option>
					  	<option value="morado">Morado</option>
					  	<option value="pistacho">Pistacho</option>
					  	<option value="gris">Gris</option>
					</select>
				@endfor
			@else
				<h1>Ya terminaron tus intentos</h1>
			@endif
			
		</br>
			<input type="submit" value="Comprobar"></br>
			<h2>Jugador/a: {{Session::get('nombre')}}</h2></br>
		</form>
	</body>
</html>