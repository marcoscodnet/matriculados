<?php

/**
 * incumbencia registro.
 *
 * @author Marcos
 * @since 13-12-2013
 */

class IncumbenciaRegistro extends Entity{

	//variables de instancia.
	
	private $incumbencia;

	private $registro;
	
	
	
	private $user;
	private $fechaUltModificacion;
	
	


	public function __construct(){
		 
		$this->incumbencia = new Incumbencia();
		
		$this->registro = new Registro();
		
		
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

	public function getRegistro()
	{
	    return $this->registro;
	}

	public function setRegistro($registro)
	{
	    $this->registro = $registro;
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