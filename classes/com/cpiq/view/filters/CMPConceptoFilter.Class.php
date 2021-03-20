<?php

/**
 * componente filter para conceptos.
 *
 * @author Marcos
 * @since 25-07-2013
 *
 */
class CMPConceptoFilter extends CMPFilter{

	/**
	 * nombre del tipo de título
	 * @var string
	 */
	private $nombre;


	/**
	 * coeficiente
	 * @var Coeficiente
	 */
	private $coeficiente;
	
	/**
	 * tipoAsignado
	 * @var TipoAsignado
	 */
	private $tipoAsignado;
	
	

	public function __construct( $id="filter_conceptos"){

		parent::__construct($id);


		$this->setComponent("CMPConceptoGrid");
		$this->setTipoAsignado( new TipoAsignado() );
		

		//formamos el form de búsqueda.
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_CONCEPTO_NOMBRE, "nombre"  ) );
		
		//$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_CONCEPTO_COEFICIENTE, "coeficiente"  ) );
		
		$fieldCoeficiente = FieldBuilder::buildFieldSelect (CPIQ_LBL_CONCEPTO_COEFICIENTE, "coeficiente", Coeficiente::getItems(), null, null, null, "--Seleccionar--" );
		$this->addField( $fieldCoeficiente );
		
		$fieldTipoAsignado = FieldBuilder::buildFieldSelect (CPIQ_LBL_CONCEPTO_ASIGNADO, "tipoAsignado.oid", CPIQUtils::getTiposAsignadoItems(), null, null, null, "--Seleccionar--" );
		$this->addField( $fieldTipoAsignado );
		
		
		
		

		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		$nombre = $this->getNombre();

		if(!empty($nombre)){
			$criteria->addFilter("nombre", $nombre, "like", new CdtCriteriaFormatLikeValue() );
		}
		
		$coeficiente = $this->getCoeficiente();

		if(!empty($coeficiente)){
			
			$criteria->addFilter("coeficiente", $coeficiente, "=" );
		}
		
		$tipoAsignado = $this->getTipoAsignado();
		if($tipoAsignado!=null && $tipoAsignado->getOid()!=null){
			$criteria->addFilter("tipoAsignado_oid", $tipoAsignado->getOid(), "=" );
		}
		
		
		$criteria->addFilter("bloqueado", 0, "=" );
		
		

		

	}


	public function getNombre()
	{
		return $this->nombre;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	
	


   
    
	

	public function getCoeficiente()
	{
	    return $this->coeficiente;
	}

	public function setCoeficiente($coeficiente)
	{
	    $this->coeficiente = $coeficiente;
	}

	public function getTipoAsignado()
	{
	    return $this->tipoAsignado;
	}

	public function setTipoAsignado($tipoAsignado)
	{
	    $this->tipoAsignado = $tipoAsignado;
	}
}