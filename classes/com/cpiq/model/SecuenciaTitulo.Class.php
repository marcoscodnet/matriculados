<?php

/**
 * Secuencia título
 *  
 * @author Marcos
 * @since 10-06-2013
 */


class SecuenciaTitulo  extends Entity{

    //variables de instancia.

    private $nombre;
    private $ultMatricula;
    

    public function __construct(){
    	
    	$this->nombre = "";
    	$this->ultMatricula = "";
    }
    
    
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }


    public function getUltMatricula()
    {
        return $this->ultMatricula;
    }

    public function setUltMatricula($ultMatricula)
    {
        $this->ultMatricula = $ultMatricula;
    }
    
	public function __toString(){
    	return $this->getNombre();
    }
}
?>