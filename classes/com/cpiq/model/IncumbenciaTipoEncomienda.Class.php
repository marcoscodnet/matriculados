<?php

/**
 * incumbencia tipoEncomienda.
 *
 * @author Marcos
 * @since 27-09-2013
 */

class IncumbenciaTipoEncomienda extends Entity{

	//variables de instancia.
	
	private $incumbencia;

	private $tipoEncomienda;
	
	
	
	private $user;
	private $fechaUltModificacion;
	
	


	public function __construct(){
		 
		$this->incumbencia = new Incumbencia();
		
		$this->tipoEncomienda = new TipoEncomienda();
		
		
		$this->user = new CdtUser();
		
		$this->fechaUltModificacion = "";
	}




	

	  

	

	public function getIncumbencia()
	{
	    return $this->incumbencia;
	}

	public function setIncumbencia($incumbencia)
	{
	    $this->incumbencia = $incumbencia;
	}

	public function getTipoEncomienda()
	{
	    return $this->tipoEncomienda;
	}

	public function setTipoEncomienda($tipoEncomienda)
	{
	    $this->tipoEncomienda = $tipoEncomienda;
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