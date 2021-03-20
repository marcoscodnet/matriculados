<?php

/**
 * Registro Matriculado
 *
 * @author Marcos
 * @since 19-09-2013
 */

class RegistroMatriculado extends Entity{

	//variables de instancia.
	
	private $matriculado;
	
	
	
	private $registro;
	
	private $numero;
	
	private $fecha;
	
	private $titulo;
	
	private $user;
	private $fechaUltModificacion;
	
	
	
	


	public function __construct(){
		 
		$this->matriculado = new Matriculado();
		
		
		$this->registro = new Registro();
		
		$this->fecha = "";
		
		$this->numero = "";
		
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

	

	public function getFecha()
	{
	    return $this->fecha;
	}

	public function setFecha($fecha)
	{
	    $this->fecha = $fecha;
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

	

	public function __toString(){
		
		return '';
	}

	public function getNumero()
	{
	    return $this->numero;
	}

	public function setNumero($numero)
	{
	    $this->numero = $numero;
	}
}
?>