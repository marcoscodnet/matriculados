<?php

/**
 * Valor para una cuota valor
 *
 * @author bernardo
 * @since 28-06-2013
 */

class CuotaValor extends Entity{

	//variables de instancia.
	
	private $fechaDesde;
	private $fechaHasta;
	private $importe;
	private $importeIngeniero;
	private $cuota;
	private $cuota_oid;


	public function __construct(){
		$this->fechaDesde = "";
		$this->fechaHasta = "";
		$this->importe ="";
		$this->importeIngeniero ="";
		$this->cuota_oid ="";
		$this->cuota = new Cuota();
	}


	public function getFechaDesde()
	{
	    return $this->fechaDesde;
	}

	public function setFechaDesde($fechaDesde)
	{
	    $this->fechaDesde = $fechaDesde;
	}

	public function getFechaHasta()
	{
	    return $this->fechaHasta;
	}

	public function setFechaHasta($fechaHasta)
	{
	    $this->fechaHasta = $fechaHasta;
	}

	public function getImporte()
	{
	    return $this->importe;
	}

	public function setImporte($importe)
	{
	    $this->importe = $importe;
	}

	

	public function getCuota()
	{
	    return $this->cuota;
	}

	public function setCuota($cuota)
	{
	    $this->cuota = $cuota;
	}

	public function getCuota_oid()
	{
	    return $this->cuota_oid;
	}

	public function setCuota_oid($cuota_oid)
	{
	    $this->cuota_oid = $cuota_oid;
	}

	public function getImporteIngeniero()
	{
	    return $this->importeIngeniero;
	}

	public function setImporteIngeniero($importeIngeniero)
	{
	    $this->importeIngeniero = $importeIngeniero;
	}
}
?>