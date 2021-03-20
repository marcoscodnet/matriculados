<?php

/**
 * Tipo de asignado 
 *  
 * @author Marcos
 * @since 25-07-2013
 */


class TipoAsignado  extends Entity{

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

}
?>