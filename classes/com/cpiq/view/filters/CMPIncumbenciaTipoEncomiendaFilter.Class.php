<?php

/**
 * componente filter para incumbencias tiposEncomienda.
 *
 * @author Marcos
 * @since 27-09-2013
 *
 */
class CMPIncumbenciaTipoEncomiendaFilter extends CMPFilter{

	
	
	
	
	/**
	 * incumbencia 
	 * @var string
	 */
	private $incumbencia;
	
	/**
	 * tipoEncomienda 
	 * @var string
	 */
	private $tipoEncomienda;
	
	
	
	
	public function __construct( $id="filter_incumbenciasTiposEncomienda"){

		parent::__construct($id);


		$this->setComponent("CMPIncumbenciaTipoEncomiendaGrid");

		
		
		$this->setIncumbencia( new Incumbencia() );
		
		//formamos el form de búsqueda.
		
		
		
		
		$findIncumbencia = CPIQComponentsFactory::getFindIncumbencia(new Incumbencia(), CPIQ_LBL_INCUMBENCIA, "", "incumbenciaTipoEncomienda_filter_incumbencia_oid", "incumbencia.oid", "");
		$this->addField( $findIncumbencia );
		
		$this->setTipoEncomienda( new TipoEncomienda() );
		
		//formamos el form de búsqueda.
		
		
		
		
		$findTipoEncomienda = CPIQComponentsFactory::getFindTipoEncomienda(new TipoEncomienda(), CPIQ_LBL_TIPO_ENCOMIENDA, "", "incumbenciaTipoEncomienda_filter_tipoEncomienda_oid", "tipoEncomienda.oid", "");
		$this->addField( $findTipoEncomienda );
		
		
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
			
		
		//filtramos por incumbencia.
		$incumbencia = $this->getIncumbencia();
		if($incumbencia!=null && $incumbencia->getOid()!=null){
			$criteria->addFilter("incumbencia_oid", $incumbencia->getOid(), "=" );
		}
		
		//filtramos por tipoEncomienda.
		$tipoEncomienda = $this->getTipoEncomienda();
		if($tipoEncomienda!=null && $tipoEncomienda->getOid()!=null){
			$criteria->addFilter("tipoEncomienda_oid", $tipoEncomienda->getOid(), "=" );
		}
		
		
		
	}


	public function getIncumbencia()
	{
	    return $this->incumbencia;
	}

	public function setIncumbencia($incumbencia)
	{
	    $this->incumbencia = $incumbencia;
	}

	public function getTipoEncomienda()
	{
	    return $this->tipoEncomienda;
	}

	public function setTipoEncomienda($tipoEncomienda)
	{
	    $this->tipoEncomienda = $tipoEncomienda;
	}
}