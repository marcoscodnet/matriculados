<?php

/**
 * CambiarEstadoEncomienda
 *
 * @author Marcos
 * @since 11-10-2013
 */

class CambiarEstadoEncomienda extends Entity{

	//variables de instancia.
	
	

	private $encomienda;
	
	
	
	
	
	private $tipoEstadoEncomienda;
	
	
	
	
	
	
	


	public function __construct(){
		 
		
		
		$this->encomienda = new Encomienda();
		
		
			
		
		
		$this->tipoEstadoEncomienda = new TipoEstadoEncomienda();
		
		
		
		
		
		
	}




	

	 

	

	

	

	public function getEncomienda()
	{
	    return $this->encomienda;
	}

	public function setEncomienda($encomienda)
	{
	    $this->encomienda = $encomienda;
	}

	public function getTipoEstadoEncomienda()
	{
	    return $this->tipoEstadoEncomienda;
	}

	public function setTipoEstadoEncomienda($tipoEstadoEncomienda)
	{
	    $this->tipoEstadoEncomienda = $tipoEstadoEncomienda;
	}
}
?>