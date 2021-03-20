<?php

/**
 * Concepto
 *
 * @author Marcos
 * @since 25-07-2013
 */

class Concepto extends Entity{

	//variables de instancia.
	
	private $nombre;

	
	
	private $coeficiente;
	
	private $tipoAsignado;
	
	private $bloqueado;
	
	private $user;
	private $fechaUltModificacion;
	
	


	public function __construct(){
		 
		$this->nombre = "";
		
		
		
		$this->coeficiente = "";
		
		$this->bloqueado = 0;
		
		$this->tipoAsignado = new TipoAsignado();
		
		
		
		$this->user = new CdtUser();
		
		$this->fechaUltModificacion = "";
	}




	

	 

	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}

	public function getCoeficiente()
	{
	    return $this->coeficiente;
	}

	public function setCoeficiente($coeficiente)
	{
	    $this->coeficiente = $coeficiente;
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

	public function getTipoAsignado()
	{
	    return $this->tipoAsignado;
	}

	public function setTipoAsignado($tipoAsignado)
	{
	    $this->tipoAsignado = $tipoAsignado;
	}

	public function getBloqueado()
	{
	    return $this->bloqueado;
	}

	public function setBloqueado($bloqueado)
	{
	    $this->bloqueado = $bloqueado;
	}
	
	public function __toString(){
		
		return $this->getNombre();
	}
}
?>