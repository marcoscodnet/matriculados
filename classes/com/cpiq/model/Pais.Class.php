<?php

/**
 * Pais 
 *  
 * @author Marcos
 * @since 28-05-2013
 */


class Pais extends Entity{

    //variables de instancia.

    private $nombre;
    

    public function __construct(){
    	
    	$this->nombre = "";
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
    
}
?>