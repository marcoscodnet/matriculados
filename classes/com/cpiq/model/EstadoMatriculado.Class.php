<?php

/**
 * Estado
 *  
 * @author Marcos
 * @since 06-06-2013
 */


class EstadoMatriculado  extends Entity{

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