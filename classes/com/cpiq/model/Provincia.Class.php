<?php

/**
 * Provincia 
 *  
 * @author Marcos
 * @since 28-05-2013
 */


class Provincia extends Entity{

    //variables de instancia.

    private $nombre;
    
    private $pais;
    

    public function __construct(){
    	
    	$this->nombre = "";
    	
    	$this->pais = new Pais();
    }
    
    
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }


	public function getPais()
	{
	    return $this->pais;
	}

	public function setPais($pais)
	{
	    $this->pais = $pais;
	}
    
	public function __toString(){
    	return $this->getNombre();
    }
	
}
?>