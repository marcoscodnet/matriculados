<?php

/**
 * Registro
 *
 * @author Marcos
 * @since 04-07-2013
 */

class Registro extends Entity{

	//variables de instancia.
	
	private $nombre;

	
	
	private $sigla;
	
	
	
	private $user;
	private $fechaUltModificacion;
	
	


	public function __construct(){
		 
		$this->nombre = "";
		
		
		
		$this->sigla = "";
		
		
		
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

	public function getSigla()
	{
	    return $this->sigla;
	}

	public function setSigla($sigla)
	{
	    $this->sigla = $sigla;
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