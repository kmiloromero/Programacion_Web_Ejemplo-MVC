<?php
require_once("modelo/index.php");
class modeloController{
	private $model;
	function __construct(){
        $this->model=new Modelo();
    }
    // MOSTRAR
    function index(){
    	$producto 	=	new Modelo();
		$dato=$producto->mostrar("productos","1");
		require_once("vista/index.php");
    }

    // INSERTAR
    function nuevo(){
    	require_once("vista/nuevo.php");	    	    	
    }
    function guardar(){
    	$nombre 	=	$_REQUEST['nombre'];
    	$precio 	=	$_REQUEST['precio'];
        $data       =   "'".$nombre."','".$precio."'";
    	$producto 	=	new Modelo();
		$dato 		=	$producto->insertar("productos",$data);
		header("location:".urlsite);
    }


    // ACTUALIZAR

    function editar(){
    	$id=$_REQUEST['id'];
    	$producto 	=	new Modelo();
    	$dato=$producto->mostrar("productos","id=".$id);    	
    	require_once("vista/editar.php");
    }
    function update(){
    	$id 		= 	$_REQUEST['id'];
    	$nombre 	=	$_REQUEST['nombre'];
    	$precio 	=	$_REQUEST['precio'];
        $data       =   "nombre='".$nombre."', precio=".$precio;
        $condicion  =   "id=".$id;
    	$producto 	=	new Modelo();
		$dato 		=	$producto->actualizar("productos",$data,$condicion);
        header("location:".urlsite);
	}

    // ELIMINAR

	function eliminar(){		
		$id 		= 	$_REQUEST['id'];    	
        $condicion  =   "id=".$id;
    	$producto 	=	new Modelo();        
		$dato 		=	$producto->eliminar("productos",$condicion);
		header("location:".urlsite);
	}
}