<?php

/**
 * EncomiendaProfesional
 *
 * @author Marcos
 * @since 08-10-2013
 */

class EncomiendaProfesional extends Entity{

	//variables de instancia.
	
	

	private $encomienda;
	
	
	
	private $consejo;
	
	private $profesional;
	
	private $matricula;
	
	
	
	private $user;
	private $fechaUltModificacion;
	
	


	public function __construct(){
		 
		
		
		$this->encomienda = new Encomienda();
		
		
			
		$this->consejo = "";
		
		$this->profesional = "";
		
		$this->matricula = "";
		
		
		
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

	public function getConsejo()
	{
	    return $this->consejo;
	}

	public function setConsejo($consejo)
	{
	    $this->consejo = $consejo;
	}

	public function getProfesional()
	{
	    return $this->profesional;
	}

	public function setProfesional($profesional)
	{
	    $this->profesional = $profesional;
	}

	public function getMatricula()
	{
	    return $this->matricula;
	}

	public function setMatricula($matricula)
	{
	    $this->matricula = $matricula;
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