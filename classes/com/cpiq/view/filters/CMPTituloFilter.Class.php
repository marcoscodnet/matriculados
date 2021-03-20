<?php

/**
 * componente filter para títulos.
 *
 * @author Marcos
 * @since 12-06-2013
 *
 */
class CMPTituloFilter extends CMPFilter{

	
	/**
	 * tipo de título 
	 * @var TipoTitulo
	 */
	private $tipoTitulo;
	
	
	/**
	 * matriculado 
	 * @var string
	 */
	private $matriculado;
	
	/**
	 * matricula 
	 * @var string
	 */
	private $matricula;
	
	
	
	
	public function __construct( $id="filter_titulos"){

		parent::__construct($id);


		$this->setComponent("CMPTituloGrid");

		
		$this->setTipoTitulo( new TipoTitulo() );
		$this->setMatriculado( new Matriculado() );
		
		//formamos el form de búsqueda.
		
		
		$findTipoTitulo = CPIQComponentsFactory::getFindTipoTitulo(new TipoTitulo(), CPIQ_LBL_TIPO_TITULO, "", "titulo_filter_tipoTitulo_oid", "tipoTitulo.oid", "");
		$this->addField( $findTipoTitulo );
		
		$findMatriculado = CPIQComponentsFactory::getFindMatriculado(new Matriculado(), CPIQ_LBL_MATRICULADO, "", "titulo_filter_matriculado_oid", "matriculado.oid", "");
		$this->addField( $findMatriculado );
		
		
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_TITULO_MATRICULA, "matricula"  ) );
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		$matricula = $this->getMatricula();

		if(!empty($matricula)){
			//$criteria->addFilter("matricula", $matricula, "like", new CdtCriteriaFormatLikeValue() );
			$criteria->addFilter("matricula", $matricula, "=" );
		}
		
		

		//filtramos por tipoTitulo.
		$tipoTitulo = $this->getTipoTitulo();
		if($tipoTitulo!=null && $tipoTitulo->getOid()!=null){
			$criteria->addFilter("tipoTitulo_oid", $tipoTitulo->getOid(), "=" );
		}
		
		//filtramos por matriculado.
		$matriculado = $this->getMatriculado();
		if($matriculado!=null && $matriculado->getOid()!=null){
			$criteria->addFilter("matriculado_oid", $matriculado->getOid(), "=" );
		}
		
		
		
		
	}




	

	public function getTipoTitulo()
	{
	    return $this->tipoTitulo;
	}

	public function setTipoTitulo($tipoTitulo)
	{
	    $this->tipoTitulo = $tipoTitulo;
	}

	public function getMatriculado()
	{
	    return $this->matriculado;
	}

	public function setMatriculado($matriculado)
	{
	    $this->matriculado = $matriculado;
	}

	public function getMatricula()
	{
	    return $this->matricula;
	}

	public function setMatricula($matricula)
	{
	    $this->matricula = $matricula;
	}
}