<?php

/**
 * CambiarEstadoMatriculado
 *
 * @author Marcos
 * @since 25-10-2013
 */

class CambiarEstadoMatriculado extends Entity{

	//variables de instancia.
	
	

	private $matriculado;
	
	
	
	
	
	private $estadoMatriculado;
	
	
	private $motivo;
	
	
	
	


	public function __construct(){
		 
		
		
		$this->matriculado = new Matriculado();
		
		
			
		
		
		$this->estadoMatriculado = new EstadoMatriculado();
		
		
		$this->motivo = "";
		
		
		
	}




	

	 

	

	

	

	

	public function getMatriculado()
	{
	    return $this->matriculado;
	}

	public function setMatriculado($matriculado)
	{
	    $this->matriculado = $matriculado;
	}

	public function getEstadoMatriculado()
	{
	    return $this->estadoMatriculado;
	}

	public function setEstadoMatriculado($estadoMatriculado)
	{
	    $this->estadoMatriculado = $estadoMatriculado;
	}

	public function getMotivo()
	{
	    return $this->motivo;
	}

	public function setMotivo($motivo)
	{
	    $this->motivo = $motivo;
	}
}
?>