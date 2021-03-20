<?php

/**
 * Tipo de pago 
 *  
 * @author Marcos
 * @since 17-10-2013
 */


class TipoPago  extends Entity{

    //variables de instancia.

    private $nombre;
    
    private $entidad;
    
    private $cheque;
    

    public function __construct(){
    	
    	$this->nombre = "";
    	
    	$this->entidad = 0;
    	
    	$this->cheque = 0;
    }
    
    
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }


    public function getEntidad()
    {
        return $this->entidad;
    }

    public function setEntidad($entidad)
    {
        $this->entidad = $entidad;
    }

    public function getCheque()
    {
        return $this->cheque;
    }

    public function setCheque($cheque)
    {
        $this->cheque = $cheque;
    }
}
?>