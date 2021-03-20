<?php

/**
 * Nos ayuda con el formulario para cuotas.
 * 
 * Para manejar la colección de valores de la cuota
 *
 * @author Bernardo Iribarne (bernardo.iribarne@codnet.com.ar)
 * @since 27-06-2013
 *
 */
class CMPCuotaFormHelper  extends CMPComponent{

	private $valores;
	
	private $form;
	
	private $fechaHasta;
	private $fechaDesde;
	private $importe;
	private $importeIngeniero;
	
	function __construct(ItemCollection $valoresCuota=null){
		
		$this->valores = array();
		
		$array_labels = array();
		
		$form = new CMPForm("edit_valores_cuota" );
		
		//$fieldset = new FormFieldset( "Valores de la cuota" );
		//$form->addFieldset($fieldset);
		
    	$form->setSubmitLabel( "");
    	$form->setCancelLabel( "");
    	$form->setRenderer(new CMPCuotaValorFormRenderer());
    	
    	$form->addProperty("method", "POST");
    	
    	$this->setForm($form);

    	
    	
    	//definir mensajes y poner en lugar del 3 la constante que me comentabas.
    	$cantidadValoresCuota = CPIQ_NRO_VALORES_CUOTA;
    	
    	if( $valoresCuota == null ){
    		$valoresCuota = new ItemCollection();
    		for ($index=0;$index<$cantidadValoresCuota;$index++){
    		  	$valoresCuota->addItem( new CuotaValor() );
    		  	
    		}
    	}
    	
		for ($index=0;$index<$cantidadValoresCuota;$index++){
    		  	
    		  	$array_labels[]=CPIQ_LBL_CUOTA_VALOR.' '.($index+1); 
    		}
    	 
    	$this->initValores($cantidadValoresCuota, $array_labels, 
    						$valoresCuota
    						);
    	
	}
	
	function initValores($cantidad, $labels, $valoresCuota=null){
		for ($index=0; $index<$cantidad;$index++){
			$cuotaValor = $valoresCuota->getObjectByIndex($index);
    		$this->addValorCuota($labels[$index], ($index+1), $cuotaValor);
		}
	}
	
	function addValorCuota($label, $index, CuotaValor $cuotaValor){
		
		$fieldset = new FormFieldset( $label );
		
		$fieldFechaHasta = FieldBuilder::buildFieldDate ( CPIQ_LBL_CUOTA_VALOR_FECHA_DESDE, "fechaDesde_$index", CPIQ_MSG_CUOTA_VALOR_FECHA_DESDE_REQUIRED  );
		$fieldset->addField( $fieldFechaHasta, 1 );
		
		$fieldFechaHasta = FieldBuilder::buildFieldDate ( CPIQ_LBL_CUOTA_VALOR_FECHA_HASTA, "fechaHasta_$index", CPIQ_MSG_CUOTA_VALOR_FECHA_HASTA_REQUIRED  );
		$fieldset->addField( $fieldFechaHasta, 2 );

		$fieldset->addField( FieldBuilder::buildFieldNumber ( CPIQ_LBL_CUOTA_VALOR_IMPORTE_INGENIERO, "importeIngeniero_$index", CPIQ_MSG_CUOTA_VALOR_IMPORTE_INGENIERO_REQUIRED, "", 5 ), 3 );		
		
		$fieldset->addField( FieldBuilder::buildFieldNumber ( CPIQ_LBL_CUOTA_VALOR_IMPORTE_OTROS, "importe_$index", CPIQ_MSG_CUOTA_VALOR_IMPORTE_REQUIRED, "", 5 ), 4 );
		
		$this->getForm()->addHidden( FieldBuilder::buildInputHidden ( "oid_$index", "") );
		
		$this->getForm()->addFieldset( $fieldset );
		
		$this->valores[$index] =  $cuotaValor;
	}
	
	
	/**
	 * (non-PHPdoc)
	 * @see components/CMPComponent::show()
	 */
	public function show( ){
		
		//rellenamos los valores del formulario.
		$this->fillInputValues();
		
		//mostramos el formulario.
		return $this->getForm()->show();
	}
	
	public function fillInputValues(){
		$this->getForm()->fillInputValues($this);
	}
	
	public function fillEntityValues(){
		
		$this->getForm()->fillEntityValues($this);
		
	}

	public function setIsEditable( $editable ){
		
		$this->form->setIsEditable( $editable );
	}
	
	public function getForm()
	{
	    return $this->form;
	}

	public function setForm($form)
	{
	    $this->form = $form;
	}

	public function getValores()
	{
	    return $this->valores;
	}

	public function setValores($valores)
	{
	    $this->valores = $valores;
	}
	
	/*
	public function __call($name, $arguments)
    {
    	$name = explode("_", $name);
		$index = $name[1];
		$name = $name[0];
    	
        //getter o setter?
        if (strpos($name, "get") === 0) {
        	$name = substr($name, 3, (strlen($name)-3));
        	if (array_key_exists($name, $this->valores[$index])) {
            	return $this->valores[$index][$name];
        	}
        }elseif(strpos($name, "set") === 0) {
        	$name = substr($name, 3, (strlen($name)-3));
        	if (array_key_exists($name, $this->valores[$index])) {
            	$this->valores[$index][$name] = $arguments[0];
        	}        	
        }
    }*/

	public function getFechaDesde($index){
		$cuotaValor = $this->valores[$index];
		return $cuotaValor->getFechaDesde();
	}
	public function getFechaHasta($index){
		$cuotaValor = $this->valores[$index];
		return $cuotaValor->getFechaHasta();
	}
	public function getImporte($index){
		$cuotaValor = $this->valores[$index];
		return $cuotaValor->getImporte();
	}
	public function getImporteIngeniero($index){
		$cuotaValor = $this->valores[$index];
		return $cuotaValor->getImporteIngeniero();
	}
	public function getOid($index){
		$cuotaValor = $this->valores[$index];
		return $cuotaValor->getOid();
	}
	
	public function setFechaDesde($index, $valor){
		$cuotaValor = $this->valores[$index];
		$cuotaValor->setFechaDesde($valor);
	}
	public function setFechaHasta($index, $valor){
		$cuotaValor = $this->valores[$index];
		$cuotaValor->setFechaHasta($valor);
	}
	public function setImporte($index, $valor){
		$cuotaValor = $this->valores[$index];
		$cuotaValor->setImporte($valor);
	}
	public function setImporteIngeniero($index, $valor){
		$cuotaValor = $this->valores[$index];
		$cuotaValor->setImporteIngeniero($valor);
	}
	
	public function setOid($index, $valor){
		$cuotaValor = $this->valores[$index];
		$cuotaValor->setOid($valor);
	}
	
	public function getFechaDesde_1(){ return $this->getFechaDesde(1);}
	public function getFechaDesde_2(){ return $this->getFechaDesde(2);}
	public function getFechaDesde_3(){ return $this->getFechaDesde(3);}
	
	public function getFechaHasta_1(){ return $this->getFechaHasta(1);}
	public function getFechaHasta_2(){ return $this->getFechaHasta(2);}
	public function getFechaHasta_3(){ return $this->getFechaHasta(3);}
	
	public function getImporte_1(){ return $this->getImporte(1);}
	public function getImporte_2(){ return $this->getImporte(2);}
	public function getImporte_3(){ return $this->getImporte(3);}
	
	public function getImporteIngeniero_1(){ return $this->getImporteIngeniero(1);}
	public function getImporteIngeniero_2(){ return $this->getImporteIngeniero(2);}
	public function getImporteIngeniero_3(){ return $this->getImporteIngeniero(3);}
	
	public function getOid_1(){ return $this->getOid(1);}
	public function getOid_2(){ return $this->getOid(2);}
	public function getOid_3(){ return $this->getOid(3);}
	
	
	public function setFechaDesde_1($value){ $this->setFechaDesde(1, $value);}
	public function setFechaDesde_2($value){ $this->setFechaDesde(2, $value);}
	public function setFechaDesde_3($value){ $this->setFechaDesde(3, $value);}
	
	public function setFechaHasta_1($value){ $this->setFechaHasta(1, $value);}
	public function setFechaHasta_2($value){ $this->setFechaHasta(2, $value);}
	public function setFechaHasta_3($value){ $this->setFechaHasta(3, $value);}
	
	public function setImporte_1($value){ $this->setImporte(1, $value);}
	public function setImporte_2($value){ $this->setImporte(2, $value);}
	public function setImporte_3($value){ $this->setImporte(3, $value);}
	
	public function setImporteIngeniero_1($value){ $this->setImporteIngeniero(1, $value);}
	public function setImporteIngeniero_2($value){ $this->setImporteIngeniero(2, $value);}
	public function setImporteIngeniero_3($value){ $this->setImporteIngeniero(3, $value);}

	public function setOid_1($value){ $this->setOid(1, $value);}
	public function setOid_2($value){ $this->setOid(2, $value);}
	public function setOid_3($value){ $this->setOid(3, $value);}
	
	/*public function setValoresCuota(array $valoresCuota){
		
		$cantidadValoresCuota = CPIQ_NRO_VALORES_CUOTA;
		 
		if( $valoresCuota == null ){
			$valoresCuota = array();
			for ($index=0;$index<$cantidadValoresCuota;$index++)
				$valoresCuota[] = new CuotaValor();
		}
		
		$this->initValores($cantidadValoresCuota, array("1er Valor cuota",
				"2do Valor cuota",
				"3er Valor cuota"),
				$valoresCuota
		);
	}*/
}