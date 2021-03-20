<?php

/**
 * Incumbencia
 *
 * @author Marcos
 * @since 26-09-2013
 */

class Incumbencia extends Entity{

	//variables de instancia.
	
	private $nombre;

	
	
	
	private $user;
	private $fechaUltModificacion;
	
	


	public function __construct(){
		 
		$this->nombre = "";
		
		
		
		
		
		
		
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
	
	public function __toString(){
		
		return $this->getNombre();
	}
}
?>