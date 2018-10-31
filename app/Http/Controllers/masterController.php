<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class masterController extends Controller
{
    public function vista(Request $request){
    	Session_start();
    	$nombre = $request->input('nombre');
    	$clave = $request->input('clave');
    	$colores = $request->input('colores');
    	$repetidos = $request->input('repetidos');
    	$intentos = $request->input('intentos');
    	$arrayColores = array('azul','amarillo','verde','rojo','azulClaro','morado','pistacho','gris');
    	$opciones2=$arrayColores;

    	$arrayClave[0]="sad";
    	array_splice($arrayColores, $colores);
    	array_splice($opciones2, $colores);
    	for ($i=0; $i < $clave; $i++){ 
    		$numRandom = random_int(0, count($arrayColores)-1);
    		//echo join(',', $arrayClave);
    		$arrayClave[$i]=$arrayColores[$numRandom];
    		if($repetidos=='No'){
    			unset($arrayColores[$numRandom]);
    			$arrayColores=array_values($arrayColores);
    		}
    	}
    	
    	Session(['nombre' => $nombre]);
    	Session(['clave' => $clave]);
    	Session(['colores' => $colores]);
    	Session(['repetidos' => $repetidos]);
    	Session(['intentos' => $intentos]);
    	Session(['arrayClave' => $arrayClave]);
    	Session(['historial' => null]);
    	return view('vistaMaster');
    }

    public function comprobar(Request $request){
    	Session_start();

    	$clave=session('clave');
    	$colores=session('colores');
    	$intentos=session('intentos');
    	$arrayClave=session('arrayClave');
    	$correcto=0;
    	$candidato=0;
    	$res="";
    	if ($intentos>0) {
    		$intentos--;
    		for ($i=0; $i < $clave; $i++) { 
	    		$arraySelect=$request->input('selectColores'.$i);
	    		$res=$res."<img src='".$arraySelect.".png' width='100px' height='100px'>";

	    		//$res=$res."patata";
	    		if ($arrayClave[$i]==$arraySelect){
	    			$correcto++;
	    		}else if (in_array($arraySelect, $arrayClave)) {
	    			$candidato++;
	    		}

	    	}

	    	$hist=Session('historial');
	    	if($hist==null){
	    		$hist=array();
	    	}
	    	$historial=array($res, $correcto, $candidato);

	    	array_push($hist, $historial);
	    	Session(['historial' => $hist]);
	    	Session(['intentos'=>$intentos]);
    	
    	}    	
    	return view('vistaMaster');
    }
}