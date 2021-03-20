<?php

/**
 * Matriculado
 *
 * @author Bernardo
 * @since 17-05-2013
 */

class Matriculado extends Entity{

	//variables de instancia.

	private $nombre;
	
	private $apellido;

	private $fechaNacimiento;
	
	private $localidad;
	
	private $sexo;
	
	private $email;
	
	private $tipoDocumento;
	
	private $nroDocumento;
	
	private $domicilio;
	private $codigoPostal;
	private $teParticular;
	private $teLaboral;
	private $teMovil;
	private $fechaCarga;
	
	private $user;
	private $fechaUltModificacion;
	
	private $cdtUser;
	
	private $titulo;
	
	private $estadoMatriculado;

	public function __construct(){
		 
		$this->nombre = "";
		
		$this->apellido = "";
		
		$this->fechaNacimiento = "";
		
		$this->localidad = new Localidad();
		
		$this->sexo = "";
		
		$this->email = "";
		
		$this->tipoDocumento = new TipoDocumento();
		
		$this->nroDocumento = "";
		
		$this->domicilio = "";
		
		$this->codigoPostal = "";
		
		$this->teParticular = "";
		
		$this->teLaboral = "";
		
		$this->teMovil = "";
		
		$this->fechaCarga = "";
		
		$this->user = new CdtUser();
		
		$this->fechaUltModificacion = "";
		
		$this->cdtUser = new CdtUser();
		
		$this->estadoMatriculado = new EstadoMatriculado();
		
	}




	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}

	public function getFechaNacimiento()
	{
	    return $this->fechaNacimiento;
	}

	public function setFechaNacimiento($fechaNacimiento)
	{
	    $this->fechaNacimiento = $fechaNacimiento;
	}

	public function getLocalidad()
	{
	    return $this->localidad;
	}

	public function setLocalidad($localidad)
	{
	    $this->localidad = $localidad;
	}

	public function getSexo()
	{
	    return $this->sexo;
	}

	public function setSexo($sexo)
	{
	    $this->sexo = $sexo;
	}

	public function getEmail()
	{
	    return $this->email;
	}

	public function setEmail($email)
	{
	    $this->email = $email;
	}

	public function getTipoDocumento()
	{
	    return $this->tipoDocumento;
	}

	public function setTipoDocumento($tipoDocumento)
	{
	    $this->tipoDocumento = $tipoDocumento;
	}

	public function getNroDocumento()
	{
	    return $this->nroDocumento;
	}

	public function setNroDocumento($nroDocumento)
	{
	    $this->nroDocumento = $nroDocumento;
	}
	
	public function __toString(){
		
		return $this->getApellido().' '.$this->getNombre();
	}

	public function getDomicilio()
	{
	    return $this->domicilio;
	}

	public function setDomicilio($domicilio)
	{
	    $this->domicilio = $domicilio;
	}

	public function getTeParticular()
	{
	    return $this->teParticular;
	}

	public function setTeParticular($teParticular)
	{
	    $this->teParticular = $teParticular;
	}

	public function getTeLaboral()
	{
	    return $this->teLaboral;
	}

	public function setTeLaboral($teLaboral)
	{
	    $this->teLaboral = $teLaboral;
	}

	public function getTeMovil()
	{
	    return $this->teMovil;
	}

	public function setTeMovil($teMovil)
	{
	    $this->teMovil = $teMovil;
	}

	public function getFechaCarga()
	{
	    return $this->fechaCarga;
	}

	public function setFechaCarga($fechaCarga)
	{
	    $this->fechaCarga = $fechaCarga;
	}

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
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

	public function getCodigoPostal()
	{
	    return $this->codigoPostal;
	}

	public function setCodigoPostal($codigoPostal)
	{
	    $this->codigoPostal = $codigoPostal;
	}

	public function getCdtUser()
	{
	    return $this->cdtUser;
	}

	public function setCdtUser($cdtUser)
	{
	    $this->cdtUser = $cdtUser;
	}

	public function getTitulo()
	{
	    return $this->titulo;
	}

	public function setTitulo($titulo)
	{
	    $this->titulo = $titulo;
	}

	public function getEstadoMatriculado()
	{
	    return $this->estadoMatriculado;
	}

	public function setEstadoMatriculado($estadoMatriculado)
	{
	    $this->estadoMatriculado = $estadoMatriculado;
	}
}
?>