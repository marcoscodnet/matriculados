<?php

/**
 * Tipo de documento 
 *  
 * @author Bernardo
 * @since 27-02-2013
 */


class TipoDocumento  extends Entity{

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