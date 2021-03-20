<?php

/**
 * Encomienda Registro
 *
 * @author Marcos
 * @since 08-10-2013
 */

class EncomiendaEspecialidad extends Entity{

	//variables de instancia.
	
	private $encomienda;
	
	private $titulo;
	
	private $tipoTitulo;
	
	
	private $user;
	private $fechaUltModificacion;
	
	
	
	


	public function __construct(){
		 
		$this->encomienda = new Encomienda();
		
		$this->titulo = new Titulo();
		
		
		
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

	public function getTitulo()
	{
	    return $this->titulo;
	}

	public function setTitulo($titulo)
	{
	    $this->titulo = $titulo;
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

	public function getTipoTitulo()
	{
	    return $this->tipoTitulo;
	}

	public function setTipoTitulo($tipoTitulo)
	{
	    $this->tipoTitulo = $tipoTitulo;
	}
}
?>