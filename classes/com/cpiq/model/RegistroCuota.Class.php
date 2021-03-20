<?php

/**
 * Registro Cuota
 *
 * @author Marcos
 * @since 04-07-2013
 */

class RegistroCuota extends Entity{

	//variables de instancia.
	
	private $registro;

	
	
	private $year;
	
	private $importe;
	
	private $user;
	private $fechaUltModificacion;
	
	


	public function __construct(){
		 
		$this->registro = new Registro();
		
		
		$this->year = "";
		
		$this->importe = "";
		
		$this->user = new CdtUser();
		
		$this->fechaUltModificacion = "";
	}




	

	  

	public function getRegistro()
	{
	    return $this->registro;
	}

	public function setRegistro($registro)
	{
	    $this->registro = $registro;
	}

	public function getYear()
	{
	    return $this->year;
	}

	public function setYear($year)
	{
	    $this->year = $year;
	}

	public function getImporte()
	{
	    return $this->importe;
	}

	public function setImporte($importe)
	{
	    $this->importe = $importe;
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
		
		return $this->getYear().' '.CPIQ_LBL_CUOTA_VALOR_IMPORTE.': '.CPIQUtils::formatMontoToView($this->getImporte());
	}
}
?>