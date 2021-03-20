<?php

/**
 * EncomiendaEstado
 *
 * @author Marcos
 * @since 04-10-2013
 */

class EncomiendaEstado extends Entity{

	//variables de instancia.
	
	private $encomienda;

	private $tipoEstadoEncomienda;
	
	
	
	private $fechaDesde;
	
	private $fechaHasta;
	
	
	
	
	
	private $user;
	private $fechaUltModificacion;
	
	


	public function __construct(){
		 
		$this->encomienda = new Encomienda();
		
		$this->tipoEstadoEncomienda = new TipoEstadoEncomienda();
		
		
			
		$this->fechaDesde = "";
		
		$this->fechaHasta = "";
		
		
		
		
		
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

	public function getTipoEstadoEncomienda()
	{
	    return $this->tipoEstadoEncomienda;
	}

	public function setTipoEstadoEncomienda($tipoEstadoEncomienda)
	{
	    $this->tipoEstadoEncomienda = $tipoEstadoEncomienda;
	}

	public function getFechaDesde()
	{
	    return $this->fechaDesde;
	}

	public function setFechaDesde($fechaDesde)
	{
	    $this->fechaDesde = $fechaDesde;
	}

	public function getFechaHasta()
	{
	    return $this->fechaHasta;
	}

	public function setFechaHasta($fechaHasta)
	{
	    $this->fechaHasta = $fechaHasta;
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