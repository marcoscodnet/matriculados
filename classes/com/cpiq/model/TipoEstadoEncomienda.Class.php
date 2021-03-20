<?php

/**
 * Tipo de estado de encomienda 
 *  
 * @author Bernardo
 * @since 03-10-2013
 */


class TipoEstadoEncomienda  extends Entity{

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