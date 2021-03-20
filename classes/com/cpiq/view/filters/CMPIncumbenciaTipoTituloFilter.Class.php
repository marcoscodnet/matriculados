<?php

/**
 * componente filter para incumbencias tiposTitulo.
 *
 * @author Marcos
 * @since 26-09-2013
 *
 */
class CMPIncumbenciaTipoTituloFilter extends CMPFilter{

	
	
	
	
	/**
	 * incumbencia 
	 * @var string
	 */
	private $incumbencia;
	
	/**
	 * tipoTitulo 
	 * @var string
	 */
	private $tipoTitulo;
	
	
	
	
	public function __construct( $id="filter_incumbenciasTiposTitulo"){

		parent::__construct($id);


		$this->setComponent("CMPIncumbenciaTipoTituloGrid");

		
		
		$this->setIncumbencia( new Incumbencia() );
		
		//formamos el form de búsqueda.
		
		
		
		
		$findIncumbencia = CPIQComponentsFactory::getFindIncumbencia(new Incumbencia(), CPIQ_LBL_INCUMBENCIA, "", "incumbenciaTipoTitulo_filter_incumbencia_oid", "incumbencia.oid", "");
		$this->addField( $findIncumbencia );
		
		$this->setTipoTitulo( new TipoTitulo() );
		
		//formamos el form de búsqueda.
		
		
		
		
		$findTipoTitulo = CPIQComponentsFactory::getFindTipoTitulo(new TipoTitulo(), CPIQ_LBL_TIPO_TITULO, "", "incumbenciaTipoTitulo_filter_tipoTitulo_oid", "tipoTitulo.oid", "");
		$this->addField( $findTipoTitulo );
		
		
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
			
		
		//filtramos por incumbencia.
		$incumbencia = $this->getIncumbencia();
		if($incumbencia!=null && $incumbencia->getOid()!=null){
			$criteria->addFilter("incumbencia_oid", $incumbencia->getOid(), "=" );
		}
		
		//filtramos por tipoTitulo.
		$tipoTitulo = $this->getTipoTitulo();
		if($tipoTitulo!=null && $tipoTitulo->getOid()!=null){
			$criteria->addFilter("tipoTitulo_oid", $tipoTitulo->getOid(), "=" );
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

	public function getTipoTitulo()
	{
	    return $this->tipoTitulo;
	}

	public function setTipoTitulo($tipoTitulo)
	{
	    $this->tipoTitulo = $tipoTitulo;
	}
}