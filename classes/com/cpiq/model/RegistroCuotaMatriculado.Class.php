<?php

/**
 * Registro Matriculado
 *
 * @author Marcos
 * @since 20-03-2017
 */

class RegistroCuotaMatriculado extends Entity{

	//variables de instancia.
	
	private $matriculado;
	
	private $registroCuota;
	
	private $registro;
	
	private $movCtaCte;
	
	private $movCtaCteDeuda;
	
	private $fecha;
	
	private $titulo;
	
	private $user;
	private $fechaUltModificacion;
	
	
	
	


	public function __construct(){
		 
		$this->matriculado = new Matriculado();
		
		$this->registroCuota = new RegistroCuota();
		
		$this->movCtaCte = new MovCtaCte();
		
		$this->movCtaCteDeuda = new MovCtaCte();
		
		$this->registro = new Registro();
		
		$this->fecha = "";
		
		$this->titulo = new Titulo();
		
		$this->user = new CdtUser();
		
		$this->fechaUltModificacion = "";
		
		
	}




	

	  

	

	public function getMatriculado()
	{
	    return $this->matriculado;
	}

	public function setMatriculado($matriculado)
	{
	    $this->matriculado = $matriculado;
	}

	public function getRegistroCuota()
	{
	    return $this->registroCuota;
	}

	public function setRegistroCuota($registroCuota)
	{
	    $this->registroCuota = $registroCuota;
	}

	public function getFecha()
	{
	    return $this->fecha;
	}

	public function setFecha($fecha)
	{
	    $this->fecha = $fecha;
	}

	public function getMovCtaCte()
	{
	    return $this->movCtaCte;
	}

	public function setMovCtaCte($movCtaCte)
	{
	    $this->movCtaCte = $movCtaCte;
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

	public function getRegistro()
	{
	    return $this->registro;
	}

	public function setRegistro($registro)
	{
	    $this->registro = $registro;
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

	public function __toString(){
		
		return '';
	}
}
?>