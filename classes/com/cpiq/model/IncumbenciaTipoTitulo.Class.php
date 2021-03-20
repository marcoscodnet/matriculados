<?php

/**
 * incumbencia tipoTitulo.
 *
 * @author Marcos
 * @since 26-09-2013
 */

class IncumbenciaTipoTitulo extends Entity{

	//variables de instancia.
	
	private $incumbencia;

	private $tipoTitulo;
	
	
	
	private $user;
	private $fechaUltModificacion;
	
	


	public function __construct(){
		 
		$this->incumbencia = new Incumbencia();
		
		$this->tipoTitulo = new TipoTitulo();
		
		
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

	public function getTipoTitulo()
	{
	    return $this->tipoTitulo;
	}

	public function setTipoTitulo($tipoTitulo)
	{
	    $this->tipoTitulo = $tipoTitulo;
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