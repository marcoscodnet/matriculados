<?php

/**
 * Tipo de título
 *
 * @author Bernardo
 * @since 17-05-2013
 */

class TipoTitulo extends Entity{

	//variables de instancia.

	private $nombre;
	
	private $claseTitulo;
	
	private $secuenciaTitulo;
	
	private $ingenieroLicenciado;

	public function __construct(){
		 
		$this->nombre = "";
		
		$this->claseTitulo = new ClaseTitulo();
		
		$this->secuenciaTitulo = new SecuenciaTitulo();
		
		$this->ingenieroLicenciado = "";
	}


	public function getNombre()
	{
		return $this->nombre;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}


    public function getClaseTitulo()
    {
        return $this->claseTitulo;
    }

    public function setClaseTitulo($claseTitulo)
    {
        $this->claseTitulo = $claseTitulo;
    }

    public function getSecuenciaTitulo()
    {
        return $this->secuenciaTitulo;
    }

    public function setSecuenciaTitulo($secuenciaTitulo)
    {
        $this->secuenciaTitulo = $secuenciaTitulo;
    }
    
	public function __toString(){
		
		return $this->getNombre();
	}

	public function getIngenieroLicenciado()
	{
	    return $this->ingenieroLicenciado;
	}

	public function setIngenieroLicenciado($ingenieroLicenciado)
	{
	    $this->ingenieroLicenciado = $ingenieroLicenciado;
	}
}
?>