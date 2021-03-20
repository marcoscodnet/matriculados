<?php

/**
 * Encomienda Registro
 *
 * @author Marcos
 * @since 08-10-2013
 */

class EncomiendaRegistro extends Entity{

	//variables de instancia.
	
	private $encomienda;
	
	private $registroMatriculado;
	
	
	
	private $user;
	private $fechaUltModificacion;
	
	
	
	


	public function __construct(){
		 
		$this->encomienda = new Encomienda();
		
		$this->registroMatriculado = new RegistroMatriculado();
		
		
		
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

	public function getRegistroMatriculado()
	{
	    return $this->registroMatriculado;
	}

	public function setRegistroMatriculado($registroMatriculado)
	{
	    $this->registroMatriculado = $registroMatriculado;
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