<?php

/**
 * PagarEncomienda
 *
 * @author Marcos
 * @since 17-10-2013
 */

class PagarEncomienda extends Entity{

	//variables de instancia.
	
	

	private $encomienda;
	
	private $tipoPago;
	
	private $movCtaCte;
	
	private $movCtaCteDeuda;
	
	private $importe;
	
	private $entidad;
	
	private $nroCheque;
	
	private $user;
	private $fechaUltModificacion;
	
	
	


	public function __construct(){
		
		$this->encomienda = new Encomienda();
		
		$this->tipoPago = new TipoPago();
		
		$this->movCtaCte = new MovCtaCte();
		
		$this->movCtaCteDeuda = new MovCtaCte();
		
		$this->importe = "";
		
		$this->entidad = "";
		
		$this->nroCheque = "";
		
		$this->user = new CdtUser();
		
		$this->fechaUltModificacion = "";
		
	}




	

	 

	

	

	

	public function getEncomienda()
	{
	    return $this->encomienda;
	}

	public function setEncomienda($encomienda)
	{
	    $this->encomienda = $encomienda;
	}

	public function getTipoPago()
	{
	    return $this->tipoPago;
	}

	public function setTipoPago($tipoPago)
	{
	    $this->tipoPago = $tipoPago;
	}

    public function getMovCtaCte()
    {
        return $this->movCtaCte;
    }

    public function setMovCtaCte($movCtaCte)
    {
        $this->movCtaCte = $movCtaCte;
    }

    public function getImporte()
    {
        return $this->importe;
    }

    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    public function getEntidad()
    {
        return $this->entidad;
    }

    public function setEntidad($entidad)
    {
        $this->entidad = $entidad;
    }

    public function getNroCheque()
    {
        return $this->nroCheque;
    }

    public function setNroCheque($nroCheque)
    {
        $this->nroCheque = $nroCheque;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getFechaUltModificacion()
    {
        return $this->fechaUltModificacion;
    }

    public function setFechaUltModificacion($fechaUltModificacion)
    {
        $this->fechaUltModificacion = $fechaUltModificacion;
    }

	public function getMovCtaCteDeuda()
	{
	    return $this->movCtaCteDeuda;
	}

	public function setMovCtaCteDeuda($movCtaCteDeuda)
	{
	    $this->movCtaCteDeuda = $movCtaCteDeuda;
	}
}
?>