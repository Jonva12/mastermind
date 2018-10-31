<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mastermind</title>
    </head>
    <body>
        <h1>Bienvenido/a al Mastermind</h1>
        <form action="masterController" method="get">
        Jugador/a:<input type="text" name="nombre"></br>
        Longitud de la clave:</br>
        <input type="radio" name="clave" value="4">4
        <input type="radio" name="clave" value="5">5</br>
        Numero de colores posibles:</br>
        <input type="radio" name="colores" value="4">4
        <input type="radio" name="colores" value="5">5
        <input type="radio" name="colores" value="6">6
        <input type="radio" name="colores" value="7">7
        <input type="radio" name="colores" value="8">8</br>
        Permitir repetidos:</br>
        <input type="radio" name="repetidos" value="Si">Si
        <input type="radio" name="repetidos" value="No">No</br>
        <input type="number" name="intentos">
        <input type="submit" value="Iniciar Partida"></br>
        </form>
    </body>
</html>
