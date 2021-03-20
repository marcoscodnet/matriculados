<?php

/**
 * componente filter para incumbencias registros.
 *
 * @author Marcos
 * @since 13-12-2013
 *
 */
class CMPIncumbenciaRegistroFilter extends CMPFilter{

	
	
	
	
	/**
	 * incumbencia 
	 * @var string
	 */
	private $incumbencia;
	
	/**
	 * registro 
	 * @var string
	 */
	private $registro;
	
	
	
	
	public function __construct( $id="filter_incumbenciasRegistros"){

		parent::__construct($id);


		$this->setComponent("CMPIncumbenciaRegistroGrid");

		
		
		$this->setIncumbencia( new Incumbencia() );
		
		//formamos el form de búsqueda.
		
		
		
		
		$findIncumbencia = CPIQComponentsFactory::getFindIncumbencia(new Incumbencia(), CPIQ_LBL_INCUMBENCIA, "", "incumbenciaRegistro_filter_incumbencia_oid", "incumbencia.oid", "");
		$this->addField( $findIncumbencia );
		
		$this->setRegistro( new Registro() );
		
		//formamos el form de búsqueda.
		
		
		
		
		$findRegistro = CPIQComponentsFactory::getFindRegistro(new Registro(), CPIQ_LBL_REGISTRO, "", "incumbenciaRegistro_filter_registro_oid", "registro.oid", "");
		$this->addField( $findRegistro );
		
		
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
			
		
		//filtramos por incumbencia.
		$incumbencia = $this->getIncumbencia();
		if($incumbencia!=null && $incumbencia->getOid()!=null){
			$criteria->addFilter("incumbencia_oid", $incumbencia->getOid(), "=" );
		}
		
		//filtramos por registro.
		$registro = $this->getRegistro();
		if($registro!=null && $registro->getOid()!=null){
			$criteria->addFilter("registro_oid", $registro->getOid(), "=" );
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

	public function getRegistro()
	{
	    return $this->registro;
	}

	public function setRegistro($registro)
	{
	    $this->registro = $registro;
	}
}