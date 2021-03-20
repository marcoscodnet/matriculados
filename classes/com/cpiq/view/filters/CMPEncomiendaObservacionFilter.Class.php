<?php

/**
 * componente filter para observaciones de la encomienda.
 *
 * @author Marcos
 * @since 10-10-2013
 *
 */
class CMPEncomiendaObservacionFilter extends CMPFilter{

	
	
	
	
	/**
	 * encomienda 
	 * @var string
	 */
	private $encomienda;
	
	
	
	
	
	
	public function __construct( $id="filter_encomiendasObservacion"){

		parent::__construct($id);


		$this->setComponent("CMPEncomiendaObservacionGrid");

		
		
		$this->setEncomienda( new Encomienda() );
		
		//formamos el form de búsqueda.
		
		
		
		
		$findEncomienda = CPIQComponentsFactory::getFindEncomienda(new Encomienda(), CPIQ_LBL_ENCOMIENDA, "", "encomiendaObservacion_filter_encomienda_oid", "encomienda.oid", "");
		$this->addField( $findEncomienda );
		
		
		
		
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
			
		
		//filtramos por y.
		$incumbencia = $this->getEncomienda();
		if($encomienda!=null && $encomienda->getOid()!=null){
			$criteria->addFilter("encomienda_oid", $encomienda->getOid(), "=" );
		}
		
		
		
		
		
	}


	

	public function getEncomienda()
	{
	    return $this->encomienda;
	}

	public function setEncomienda($encomienda)
	{
	    $this->encomienda = $encomienda;
	}
}