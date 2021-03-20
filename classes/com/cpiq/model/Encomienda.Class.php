<?php

/**
 * Encomienda
 *
 * @author Marcos
 * @since 03-10-2013
 */

class Encomienda extends Entity{

	//variables de instancia.

	private $matriculado;
		
	private $numero;
	  
	private $tipoEncomienda;
	  	
	private $fecha;
	  
	private $comitente;
	  
	private $tipoComitente;
	  
	private $representante;
	
	private $tipoDocumento;
	  
	private $documento;
	  
	private $cuil;
	  
	private $domicilio;
	  
	private $localidad;
	
	private $cp;
	
	private $telefono;
	
	private $seguridad;
	
	private $primero;
	
	private $segundo;
	
	private $tercero;
	
	private $cuarto;
	
	private $quinto;
	
	private $posFirmaComitente;
	
	private $seguridadTexto;
	
	private $piePagina;
	
	private $user;
	private $fechaUltModificacion;
	
	private $tipoEstadoEncomienda;
	
	private $encomiendaEstado;

	//profesionales de la encomienda.
	private $profesionales;
	
	//registros de la encomienda.
	private $registros;
	
	//especialidades de la encomienda.
	private $especialidades;
	
	//observaciones de la encomienda.
	private $observaciones;
	
	public function __construct(){
		 
		$this->matriculado = new Matriculado();
		
		$this->numero='';
		  
		$this->tipoEncomienda = new TipoEncomienda();
		  	
		$this->fecha='';
		  
		$this->comitente='';
		  
		$this->tipoComitente='';
		  
		$this->representante='';
		  
		$this->tipoDocumento = new TipoDocumento();
		
		$this->documento='';
		  
		$this->cuil='';
		  
		$this->domicilio='';
		  
		$this->localidad = new Localidad();
		
		$this->cp='';
		
		$this->telefono='';
		
		$this->seguridad='';
		
		$this->primero='';
		
		$this->segundo='';
		
		$this->tercero='';
		
		$this->cuarto='';
		
		$this->quinto='';
		
		$this->posFirmaComitente='';
		
		$this->seguridadTexto='';
		
		$this->piePagina='';
		
		$this->user = new CdtUser();
		
		$this->fechaUltModificacion = "";

		$this->profesionales = new ItemCollection();
		$this->registros = new ItemCollection();
		$this->especialidades = new ItemCollection();
		
		$this->observaciones = new ItemCollection();
		
	}




	

	public function getMatriculado()
	{
	    return $this->matriculado;
	}

	public function setMatriculado($matriculado)
	{
	    $this->matriculado = $matriculado;
	}

	public function getNumero()
	{
	    return $this->numero;
	}

	public function setNumero($numero)
	{
	    $this->numero = $numero;
	}

	public function getTipoEncomienda()
	{
	    return $this->tipoEncomienda;
	}

	public function setTipoEncomienda($tipoEncomienda)
	{
	    $this->tipoEncomienda = $tipoEncomienda;
	}

	public function getFecha()
	{
	    return $this->fecha;
	}

	public function setFecha($fecha)
	{
	    $this->fecha = $fecha;
	}

	public function getComitente()
	{
	    return $this->comitente;
	}

	public function setComitente($comitente)
	{
	    $this->comitente = $comitente;
	}

	public function getTipoComitente()
	{
	    return $this->tipoComitente;
	}

	public function setTipoComitente($tipoComitente)
	{
	    $this->tipoComitente = $tipoComitente;
	}

	public function getRepresentante()
	{
	    return $this->representante;
	}

	public function setRepresentante($representante)
	{
	    $this->representante = $representante;
	}

	public function getDocumento()
	{
	    return $this->documento;
	}

	public function setDocumento($documento)
	{
	    $this->documento = $documento;
	}

	public function getCuil()
	{
	    return $this->cuil;
	}

	public function setCuil($cuil)
	{
	    $this->cuil = $cuil;
	}

	public function getDomicilio()
	{
	    return $this->domicilio;
	}

	public function setDomicilio($domicilio)
	{
	    $this->domicilio = $domicilio;
	}

	public function getLocalidad()
	{
	    return $this->localidad;
	}

	public function setLocalidad($localidad)
	{
	    $this->localidad = $localidad;
	}

	public function getCp()
	{
	    return $this->cp;
	}

	public function setCp($cp)
	{
	    $this->cp = $cp;
	}

	public function getTelefono()
	{
	    return $this->telefono;
	}

	public function setTelefono($telefono)
	{
	    $this->telefono = $telefono;
	}

	public function getSeguridad()
	{
	    return $this->seguridad;
	}

	public function setSeguridad($seguridad)
	{
	    $this->seguridad = $seguridad;
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

	public function getPrimero()
	{
	    return $this->primero;
	}

	public function setPrimero($primero)
	{
	    $this->primero = $primero;
	}

	public function getSegundo()
	{
	    return $this->segundo;
	}

	public function setSegundo($segundo)
	{
	    $this->segundo = $segundo;
	}

	public function getTercero()
	{
	    return $this->tercero;
	}

	public function setTercero($tercero)
	{
	    $this->tercero = $tercero;
	}

	public function getCuarto()
	{
	    return $this->cuarto;
	}

	public function setCuarto($cuarto)
	{
	    $this->cuarto = $cuarto;
	}

	public function getQuinto()
	{
	    return $this->quinto;
	}

	public function setQuinto($quinto)
	{
	    $this->quinto = $quinto;
	}

	public function getPosFirmaComitente()
	{
	    return $this->posFirmaComitente;
	}

	public function setPosFirmaComitente($posFirmaComitente)
	{
	    $this->posFirmaComitente = $posFirmaComitente;
	}

	public function getSeguridadTexto()
	{
	    return $this->seguridadTexto;
	}

	public function setSeguridadTexto($seguridadTexto)
	{
	    $this->seguridadTexto = $seguridadTexto;
	}

	public function getPiePagina()
	{
	    return $this->piePagina;
	}

	public function setPiePagina($piePagina)
	{
	    $this->piePagina = $piePagina;
	}

	public function getTipoEstadoEncomienda()
	{
	    return $this->tipoEstadoEncomienda;
	}

	public function setTipoEstadoEncomienda($tipoEstadoEncomienda)
	{
	    $this->tipoEstadoEncomienda = $tipoEstadoEncomienda;
	}

	public function getEncomiendaEstado()
	{
	    return $this->encomiendaEstado;
	}

	public function setEncomiendaEstado($encomiendaEstado)
	{
	    $this->encomiendaEstado = $encomiendaEstado;
	}

	public function getTipoDocumento()
	{
	    return $this->tipoDocumento;
	}

	public function setTipoDocumento($tipoDocumento)
	{
	    $this->tipoDocumento = $tipoDocumento;
	}

	public function getProfesionales()
	{
	    return $this->profesionales;
	}

	public function setProfesionales($profesionales)
	{
	    $this->profesionales = $profesionales;
	}

	public function getRegistros()
	{
	    return $this->registros;
	}

	public function setRegistros($registros)
	{
	    $this->registros = $registros;
	}

	public function getEspecialidades()
	{
	    return $this->especialidades;
	}

	public function setEspecialidades($especialidades)
	{
	    $this->especialidades = $especialidades;
	}
	
	public function __toString(){
		
		return $this->getNumero();
	}

	public function getObservaciones()
	{
	    return $this->observaciones;
	}

	public function setObservaciones($observaciones)
	{
	    $this->observaciones = $observaciones;
	}
}
?>