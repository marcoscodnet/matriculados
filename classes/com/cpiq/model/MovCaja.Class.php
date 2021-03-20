<?php

/**
 * Movimiento Caja Consejo
 *
 * @author Marcos
 * @since 01-08-2013
 */

class MovCaja extends Entity{

	//variables de instancia.
	private $importe;
	
	private $movCtaCte;

	private $concepto;
	
	private $anulacion;
	
	private $observaciones;
	
	private $fechaCarga;
	
	private $matriculado;
	
	private $user;
	private $fechaUltModificacion;
	
	


	public function __construct(){
		 
		$this->movCtaCte = new MovCtaCte();
		
		$this->concepto = new Concepto();
		
		$this->anulacion = new Anulacion();
		
		$this->matriculado = new Matriculado();
			
		$this->fechaCarga = "";
		
		$this->observaciones = "";
		
		$this->importe = "";
		
		
		
		$this->user = new CdtUser();
		
		$this->fechaUltModificacion = "";
	}




	

	  

	public function getImporte()
	{
	    return $this->importe;
	}

	public function setImporte($importe)
	{
	    $this->importe = $importe;
	}

	public function getMovCtaCte()
	{
	    return $this->movCtaCte;
	}

	public function setMovCtaCte($movCtaCte)
	{
	    $this->movCtaCte = $movCtaCte;
	}

	
	
	public function getConcepto()
	{
	    return $this->concepto;
	}

	public function setConcepto($concepto)
	{
	    $this->concepto = $concepto;
	}

	

	public function getFechaCarga()
	{
	    return $this->fechaCarga;
	}

	public function setFechaCarga($fechaCarga)
	{
	    $this->fechaCarga = $fechaCarga;
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

	public function getAnulacion()
	{
	    return $this->anulacion;
	}

	public function setAnulacion($anulacion)
	{
	    $this->anulacion = $anulacion;
	}

	

	public function getObservaciones()
	{
	    return $this->observaciones;
	}

	public function setObservaciones($observaciones)
	{
	    $this->observaciones = $observaciones;
	}

	public function getMatriculado()
	{
	    return $this->matriculado;
	}

	public function setMatriculado($matriculado)
	{
	    $this->matriculado = $matriculado;
	}
}
?>