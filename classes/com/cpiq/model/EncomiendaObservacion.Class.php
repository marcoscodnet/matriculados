<?php

/**
 * EncomiendaObservacion
 *
 * @author Marcos
 * @since 10-10-2013
 */

class EncomiendaObservacion extends Entity{

	//variables de instancia.
	
	

	private $encomienda;
	
	
	
	
	
	private $observacion;
	
	
	
	
	private $user;
	private $fechaUltModificacion;
	
	


	public function __construct(){
		 
		
		
		$this->encomienda = new Encomienda();
		
		
			
		
		
		$this->observacion = "";
		
		
		
		
		
		$this->user = new CdtUser();
		
		$this->fechaUltModificacion = "";
	}




	

	 

	

	

	public function getEncomienda()
	{
	    return $this->encomienda;
	}

	public function setEncomienda($encomienda)
	{
	    $this->encomienda = $encomienda;
	}

	public function getObservacion()
	{
	    return $this->observacion;
	}

	public function setObservacion($observacion)
	{
	    $this->observacion = $observacion;
	}

	public function getUser()
	{
	    return $this->user;
	}

	public function setUser($user)
	{
	    $this->user = $user;
	}

	public function getFechaUltModificacion()
	{
	    return $this->fechaUltModificacion;
	}

	public function setFechaUltModificacion($fechaUltModificacion)
	{
	    $this->fechaUltModificacion = $fechaUltModificacion;
	}
}
?>