<?php

/**
 * Localidad 
 *  
 * @author Bernardo
 * @since 27-02-2013
 */


class Localidad extends Entity{

    //variables de instancia.

    private $nombre;
    
    private $provincia;
    
    

    public function __construct(){
    	
    	$this->nombre = "";
    	
    	$this->provincia = new Provincia();
    	
    	
    }
    
    
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }


    public function __toString(){
    	return $this->getNombre();
    }


    public function getProvincia()
    {
        return $this->provincia;
    }

    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }
    
	public function getPais()
    {
        return $this->provincia->getPais();
    }

    

}
?>