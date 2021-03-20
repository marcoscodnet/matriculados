<?php

/**
 * Título
 *
 * @author Marcos
 * @since 12-06-2013
 */

class Titulo extends Entity{

	//variables de instancia.
	
	private $matriculado;

	private $tipoTitulo;
	
	private $entidadEmisora;
	
	private $fechaExpedicion;
	
	private $fechaMatriculacion;
	
	private $matricula;
	
	private $tituloPrincipal;
	
	private $user;
	private $fechaUltModificacion;
	
	


	public function __construct(){
		 
		$this->matriculado = new Matriculado();
		
		$this->tipoTitulo = new TipoTitulo();
		
		$this->entidadEmisora = new EntidadEmisora();
			
		$this->fechaExpedicion = "";
		
		$this->fechaMatriculacion = "";
		
		$this->matricula = "";
		
		$this->tituloPrincipal = "";
		
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

	  public function getTipoTitulo()
	  {
	      return $this->tipoTitulo;
	  }

	  public function setTipoTitulo($tipoTitulo)
	  {
	      $this->tipoTitulo = $tipoTitulo;
	  }

	  public function getEntidadEmisora()
	  {
	      return $this->entidadEmisora;
	  }

	  public function setEntidadEmisora($entidadEmisora)
	  {
	      $this->entidadEmisora = $entidadEmisora;
	  }

	  public function getFechaExpedicion()
	  {
	      return $this->fechaExpedicion;
	  }

	  public function setFechaExpedicion($fechaExpedicion)
	  {
	      $this->fechaExpedicion = $fechaExpedicion;
	  }

	  public function getFechaMatriculacion()
	  {
	      return $this->fechaMatriculacion;
	  }

	  public function setFechaMatriculacion($fechaMatriculacion)
	  {
	      $this->fechaMatriculacion = $fechaMatriculacion;
	  }

	  public function getMatricula()
	  {
	      return $this->matricula;
	  }

	  public function setMatricula($matricula)
	  {
	      $this->matricula = $matricula;
	  }

	  public function getTituloPrincipal()
	  {
	      return $this->tituloPrincipal;
	  }

	  public function setTituloPrincipal($tituloPrincipal)
	  {
	      $this->tituloPrincipal = $tituloPrincipal;
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
		
		return $this->getTipoTitulo()->getNombre();
	}
}
?>