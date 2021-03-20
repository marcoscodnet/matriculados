<?php

/**
 * Cuota Generada
 *
 * @author Marcos
 * @since 02-07-2013
 */

class CuotaGenerada extends Entity{

	//variables de instancia.
	private $nombre;
	
	private $matriculado;

	private $cuota;
	
	private $cuotaValor;
	
	private $movCtaCte;
	
	private $movCtaCteDeuda;
	
	private $fechaCarga;
	
	private $titulo;
	
	private $user;
	private $fechaUltModificacion;
	
	


	public function __construct(){
		 
		$this->matriculado = new Matriculado();
		
		$this->cuota = new Cuota();
		
		$this->cuotaValor = new CuotaValor();
		
		$this->movCtaCte = new MovCtaCte();
		
		$this->movCtaCteDeuda = new MovCtaCte();
			
		$this->fechaCarga = "";
		
		$this->titulo = new Titulo();
		
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

	public function getMatriculado()
	{
	    return $this->matriculado;
	}

	public function setMatriculado($matriculado)
	{
	    $this->matriculado = $matriculado;
	}

	
	
	public function getCuota()
	{
	    return $this->cuota;
	}

	public function setCuota($cuota)
	{
	    $this->cuota = $cuota;
	}

	public function getMovCtaCte()
	{
	    return $this->movCtaCte;
	}

	public function setMovCtaCte($movCtaCte)
	{
	    $this->movCtaCte = $movCtaCte;
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

	public function getCuotaValor()
	{
	    return $this->cuotaValor;
	}

	public function setCuotaValor($cuotaValor)
	{
	    $this->cuotaValor = $cuotaValor;
	}

	public function getTitulo()
	{
	    return $this->titulo;
	}

	public function setTitulo($titulo)
	{
	    $this->titulo = $titulo;
	}

	public function getMovCtaCteDeuda()
	{
	    return $this->movCtaCteDeuda;
	}

	public function setMovCtaCteDeuda($movCtaCteDeuda)
	{
	    $this->movCtaCteDeuda = $movCtaCteDeuda;
	}
}
?>