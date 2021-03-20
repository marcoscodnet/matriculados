<?php

/**
 * Pagar Cuota
 *
 * @author Marcos
 * @since 02-12-2016
 */

class PagarCuota extends Entity{

	//variables de instancia.
	
	private $matriculado;
	
	
	
	private $ds_contenido;
	
	
	

	public function __construct(){
		 
		$this->matriculado = new Matriculado();
		
		
		$this->ds_contenido = "";
		
		
	}




	

	 

	public function getMatriculado()
	{
	    return $this->matriculado;
	}

	public function setMatriculado($matriculado)
	{
	    $this->matriculado = $matriculado;
	}

	public function getDs_contenido()
	{
	    return $this->ds_contenido;
	}

	public function setDs_contenido($ds_contenido)
	{
	    $this->ds_contenido = $ds_contenido;
	}
}
?>