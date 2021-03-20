<?php

/**
 * Factory para componentes
 *
 * @author bernardo
 * @since 17-03-2013
 */

class CPIQComponentsFactory {


	/**
	 * componente para buscar un tipo de título
	 * @param TipoTitulo $tipo
	 * @param unknown_type $required_msg
	 * @param unknown_type $inputId
	 * @param unknown_type $inputName
	 * @param unknown_type $fCallback
	 */
	public static function getFindTipoTitulo(TipoTitulo $tipoTitulo, $label, $required_msg="", $inputId='tipoTitulo_oid', $inputName='tipoTitulo.oid', $fCallback="tipoTitulo_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($tipoTitulo->getOid(), $label, $inputId, $inputName, self::getAutocompleteTipoTitulo($tipoTitulo), get_class(ManagerFactory::getTipoTituloManager()), "CMPTipoTituloPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,nombre');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	public static function getFindTipoTituloWithAdd(TipoTitulo $tipoTitulo, $required_msg="", $inputId='tipoTitulo_oid', $inputName='tipoTitulo.oid', $fCallback="tipoTitulo_change") {

		$oFindEntity = self::getFindTipoTitulo($tipoTitulo, $required_msg, $inputId, $inputName, $fCallback);
		$oFindEntity->getInput()->setAddEntityAction("add_tipoTitulo_popup_init");
		//$oFindEntity->getInput()->setTitleAddEntity("Agregar nueva tipoTitulo");
		return $oFindEntity;
	}
	
	public static function getAutocompleteTipoTitulo(TipoTitulo $tipoTitulo, $required_msg="", $inputId='autocomplete_tipoTitulo', $inputName='autocomplete_tipoTitulo', $fCallback="autocomplete_tipoTitulo_change") {

		$autocomplete = new CMPTipoTituloAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
	public static function getFindLocalidad(Localidad $localidad, $label, $required_msg="", $inputId='localidad_oid', $inputName='localidad.oid', $fCallback="localidad_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($localidad->getOid(), $label, $inputId, $inputName, self::getAutocompleteLocalidad($localidad), get_class(ManagerFactory::getLocalidadManager()), "CMPLocalidadPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,nombre,provincia.oid');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	public static function getFindLocalidadWithAdd(Localidad $localidad, $required_msg="", $inputId='localidad_oid', $inputName='localidad.oid', $fCallback="localidad_change") {

		$oFindEntity = self::getFindLocalidad($localidad, $required_msg, $inputId, $inputName, $fCallback);
		$oFindEntity->getInput()->setAddEntityAction("add_localidad_popup_init");
		//$oFindEntity->getInput()->setTitleAddEntity("Agregar nueva localidad");
		return $oFindEntity;
	}
		

	public static function getAutocompleteLocalidad(Localidad $localidad, $required_msg="", $inputId='autocomplete_localidad', $inputName='autocomplete_localidad', $fCallback="autocomplete_localidad_change") {

		$autocomplete = new CMPLocalidadAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	

	
	public static function getFindProvincia(Provincia $provincia, $label, $required_msg="", $inputId='provincia_oid', $inputName='provincia.oid', $fCallback="provincia_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($provincia->getOid(), $label, $inputId, $inputName, self::getAutocompleteProvincia($provincia), get_class(ManagerFactory::getProvinciaManager()), "CMPProvinciaPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,nombre,pais.oid');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	public static function getFindProvinciaWithAdd(Provincia $provincia, $required_msg="", $inputId='provincia_oid', $inputName='provincia.oid', $fCallback="provincia_change") {

		$oFindEntity = self::getFindProvincia($provincia, $required_msg, $inputId, $inputName, $fCallback);
		$oFindEntity->getInput()->setAddEntityAction("add_provincia_popup_init");
		//$oFindEntity->getInput()->setTitleAddEntity("Agregar nueva provincia");
		return $oFindEntity;
	}
		

	public static function getAutocompleteProvincia(Provincia $provincia, $required_msg="", $inputId='autocomplete_provincia', $inputName='autocomplete_provincia', $fCallback="autocomplete_provincia_change") {

		$autocomplete = new CMPProvinciaAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}	
	
	public static function getFindPais(Pais $pais, $label, $required_msg="", $inputId='pais_oid', $inputName='pais.oid', $fCallback="pais_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($pais->getOid(), $label, $inputId, $inputName, self::getAutocompletePais($pais), get_class(ManagerFactory::getPaisManager()), "CMPPaisPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,nombre');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	public static function getFindPaisWithAdd(Pais $pais, $required_msg="", $inputId='pais_oid', $inputName='pais.oid', $fCallback="pais_change") {

		$oFindEntity = self::getFindPais($pais, $required_msg, $inputId, $inputName, $fCallback);
		$oFindEntity->getInput()->setAddEntityAction("add_pais_popup_init");
		//$oFindEntity->getInput()->setTitleAddEntity("Agregar nueva pais");
		return $oFindEntity;
	}
		

	public static function getAutocompletePais(Pais $pais, $required_msg="", $inputId='autocomplete_pais', $inputName='autocomplete_pais', $fCallback="autocomplete_pais_change") {

		$autocomplete = new CMPPaisAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	public static function getFindMatriculado(Matriculado $matriculado, $label, $required_msg="", $inputId='matriculado_oid', $inputName='matriculado.oid', $fCallback="matriculado_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($matriculado->getOid(), $label, $inputId, $inputName, self::getAutocompleteMatriculado($matriculado), get_class(ManagerFactory::getMatriculadoManager()), "CMPMatriculadoPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,apellido,nombre');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	public static function getFindMatriculadoWithAdd(Matriculado $matriculado, $required_msg="", $inputId='matriculado_oid', $inputName='matriculado.oid', $fCallback="matriculado_change") {

		$oFindEntity = self::getFindMatriculado($matriculado, $required_msg, $inputId, $inputName, $fCallback);
		$oFindEntity->getInput()->setAddEntityAction("add_matriculado_popup_init");
		//$oFindEntity->getInput()->setTitleAddEntity("Agregar nueva matriculado");
		return $oFindEntity;
	}
	
	public static function getAutocompleteMatriculado(Matriculado $matriculado, $required_msg="", $inputId='autocomplete_matriculado', $inputName='autocomplete_matriculado', $fCallback="autocomplete_matriculado_change") {

		$autocomplete = new CMPMatriculadoAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
	public static function getFindClaseTitulo(ClaseTitulo $claseTitulo, $label, $required_msg="", $inputId='claseTitulo_oid', $inputName='claseTitulo.oid', $fCallback="claseTitulo_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($claseTitulo->getOid(), $label, $inputId, $inputName, self::getAutocompleteClaseTitulo($claseTitulo), get_class(ManagerFactory::getClaseTituloManager()), "CMPClaseTituloPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,nombre');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	public static function getFindClaseTituloWithAdd(ClaseTitulo $claseTitulo, $required_msg="", $inputId='claseTitulo_oid', $inputName='claseTitulo.oid', $fCallback="claseTitulo_change") {

		$oFindEntity = self::getFindClaseTitulo($claseTitulo, $required_msg, $inputId, $inputName, $fCallback);
		$oFindEntity->getInput()->setAddEntityAction("add_claseTitulo_popup_init");
		//$oFindEntity->getInput()->setTitleAddEntity("Agregar nueva claseTitulo");
		return $oFindEntity;
	}
		

	public static function getAutocompleteClaseTitulo(ClaseTitulo $claseTitulo, $required_msg="", $inputId='autocomplete_claseTitulo', $inputName='autocomplete_claseTitulo', $fCallback="autocomplete_claseTitulo_change") {

		$autocomplete = new CMPClaseTituloAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
	public static function getFindSecuenciaTitulo(SecuenciaTitulo $secuenciaTitulo, $label, $required_msg="", $inputId='secuenciaTitulo_oid', $inputName='secuenciaTitulo.oid', $fCallback="secuenciaTitulo_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($secuenciaTitulo->getOid(), $label, $inputId, $inputName, self::getAutocompleteSecuenciaTitulo($secuenciaTitulo), get_class(ManagerFactory::getSecuenciaTituloManager()), "CMPSecuenciaTituloPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,nombre');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	public static function getFindSecuenciaTituloWithAdd(SecuenciaTitulo $secuenciaTitulo, $required_msg="", $inputId='secuenciaTitulo_oid', $inputName='secuenciaTitulo.oid', $fCallback="secuenciaTitulo_change") {

		$oFindEntity = self::getFindSecuenciaTitulo($secuenciaTitulo, $required_msg, $inputId, $inputName, $fCallback);
		$oFindEntity->getInput()->setAddEntityAction("add_secuenciaTitulo_popup_init");
		//$oFindEntity->getInput()->setTitleAddEntity("Agregar nueva secuenciaTitulo");
		return $oFindEntity;
	}
		

	public static function getAutocompleteSecuenciaTitulo(SecuenciaTitulo $secuenciaTitulo, $required_msg="", $inputId='autocomplete_secuenciaTitulo', $inputName='autocomplete_secuenciaTitulo', $fCallback="autocomplete_secuenciaTitulo_change") {

		$autocomplete = new CMPSecuenciaTituloAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
	public static function getFindEntidadEmisora(EntidadEmisora $entidadEmisora, $label, $required_msg="", $inputId='entidadEmisora_oid', $inputName='entidadEmisora.oid', $fCallback="entidadEmisora_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($entidadEmisora->getOid(), $label, $inputId, $inputName, self::getAutocompleteEntidadEmisora($entidadEmisora), get_class(ManagerFactory::getEntidadEmisoraManager()), "CMPEntidadEmisoraPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,nombre');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	public static function getFindEntidadEmisoraWithAdd(EntidadEmisora $entidadEmisora, $required_msg="", $inputId='entidadEmisora_oid', $inputName='entidadEmisora.oid', $fCallback="entidadEmisora_change") {

		$oFindEntity = self::getFindEntidadEmisora($entidadEmisora, $required_msg, $inputId, $inputName, $fCallback);
		$oFindEntity->getInput()->setAddEntityAction("add_entidadEmisora_popup_init");
		//$oFindEntity->getInput()->setTitleAddEntity("Agregar nueva entidadEmisora");
		return $oFindEntity;
	}
	
	public static function getAutocompleteEntidadEmisora(EntidadEmisora $entidadEmisora, $required_msg="", $inputId='autocomplete_entidadEmisora', $inputName='autocomplete_entidadEmisora', $fCallback="autocomplete_entidadEmisora_change") {

		$autocomplete = new CMPEntidadEmisoraAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
	public static function getFindCuota(Cuota $cuota, $label, $required_msg="", $inputId='cuota_oid', $inputName='cuota.oid', $fCallback="cuota_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($cuota->getOid(), $label, $inputId, $inputName, self::getAutocompleteCuota($cuota), get_class(ManagerFactory::getCuotaManager()), "CMPCuotaPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,nombre');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	public static function getFindCuotaWithAdd(Cuota $cuota, $required_msg="", $inputId='cuota_oid', $inputName='cuota.oid', $fCallback="cuota_change") {

		$oFindEntity = self::getFindCuota($cuota, $required_msg, $inputId, $inputName, $fCallback);
		$oFindEntity->getInput()->setAddEntityAction("add_cuota_popup_init");
		//$oFindEntity->getInput()->setTitleAddEntity("Agregar nueva cuota");
		return $oFindEntity;
	}
	
	public static function getAutocompleteCuota(Cuota $cuota, $required_msg="", $inputId='autocomplete_cuota', $inputName='autocomplete_cuota', $fCallback="autocomplete_cuota_change") {

		$autocomplete = new CMPCuotaAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
	public static function getFindRegistro(Registro $registro, $label, $required_msg="", $inputId='registro_oid', $inputName='registro.oid', $fCallback="registro_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($registro->getOid(), $label, $inputId, $inputName, self::getAutocompleteRegistro($registro), get_class(ManagerFactory::getRegistroManager()), "CMPRegistroPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,nombre,sigla');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	public static function getFindRegistroWithAdd(Registro $registro, $required_msg="", $inputId='registro_oid', $inputName='registro.oid', $fCallback="registro_change") {

		$oFindEntity = self::getFindRegistro($registro, $required_msg, $inputId, $inputName, $fCallback);
		$oFindEntity->getInput()->setAddEntityAction("add_registro_popup_init");
		//$oFindEntity->getInput()->setTitleAddEntity("Agregar nueva registro");
		return $oFindEntity;
	}
	
	public static function getAutocompleteRegistro(Registro $registro, $required_msg="", $inputId='autocomplete_registro', $inputName='autocomplete_registro', $fCallback="autocomplete_registro_change") {

		$autocomplete = new CMPRegistroAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
	public static function getFindRegistroCuota(RegistroCuota $registroCuota, $label, $required_msg="", $inputId='registroCuota_oid', $inputName='registroCuota.oid', $fCallback="registroCuota_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($registroCuota->getOid(), $label, $inputId, $inputName, self::getAutocompleteRegistroCuota($registroCuota), get_class(ManagerFactory::getRegistroCuotaManager()), "CMPRegistroCuotaPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,year,importe');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	public static function getFindRegistroCuotaWithAdd(RegistroCuota $registroCuota, $required_msg="", $inputId='registroCuota_oid', $inputName='registroCuota.oid', $fCallback="registroCuota_change") {

		$oFindEntity = self::getFindRegistroCuota($registroCuota, $required_msg, $inputId, $inputName, $fCallback);
		$oFindEntity->getInput()->setAddEntityAction("add_registroCuota_popup_init");
		//$oFindEntity->getInput()->setTitleAddEntity("Agregar nueva cuota");
		return $oFindEntity;
	}
	
	public static function getAutocompleteRegistroCuota(RegistroCuota $registroCuota, $required_msg="", $inputId='autocomplete_registroCuota', $inputName='autocomplete_registroCuota', $fCallback="autocomplete_registroCuota_change") {

		$autocomplete = new CMPRegistroCuotaAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
	public static function getFindIncumbencia(Incumbencia $incumbencia, $label, $required_msg="", $inputId='incumbencia_oid', $inputName='incumbencia.oid', $fCallback="incumbencia_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($incumbencia->getOid(), $label, $inputId, $inputName, self::getAutocompleteIncumbencia($incumbencia), get_class(ManagerFactory::getIncumbenciaManager()), "CMPIncumbenciaPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,nombre');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	public static function getFindIncumbenciaWithAdd(Incumbencia $incumbencia, $required_msg="", $inputId='incumbencia_oid', $inputName='incumbencia.oid', $fCallback="incumbencia_change") {

		$oFindEntity = self::getFindIncumbencia($incumbencia, $required_msg, $inputId, $inputName, $fCallback);
		$oFindEntity->getInput()->setAddEntityAction("add_incumbencia_popup_init");
		//$oFindEntity->getInput()->setTitleAddEntity("Agregar nueva incumbencia");
		return $oFindEntity;
	}
	
	public static function getAutocompleteIncumbencia(Incumbencia $incumbencia, $required_msg="", $inputId='autocomplete_incumbencia', $inputName='autocomplete_incumbencia', $fCallback="autocomplete_incumbencia_change") {

		$autocomplete = new CMPIncumbenciaAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
	public static function getFindTipoEncomienda(TipoEncomienda $tipoEncomienda, $label, $required_msg="", $inputId='tipoEncomienda_oid', $inputName='tipoEncomienda.oid', $fCallback="tipoEncomienda_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($tipoEncomienda->getOid(), $label, $inputId, $inputName, self::getAutocompleteTipoEncomienda($tipoEncomienda), get_class(ManagerFactory::getTipoEncomiendaManager()), "CMPTipoEncomiendaPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,nombre');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	public static function getFindTipoEncomiendaWithAdd(TipoEncomienda $tipoEncomienda, $required_msg="", $inputId='tipoEncomienda_oid', $inputName='tipoEncomienda.oid', $fCallback="tipoEncomienda_change") {

		$oFindEntity = self::getFindTipoEncomienda($tipoEncomienda, $required_msg, $inputId, $inputName, $fCallback);
		$oFindEntity->getInput()->setAddEntityAction("add_tipoEncomienda_popup_init");
		//$oFindEntity->getInput()->setTitleAddEntity("Agregar nueva tipoTitulo");
		return $oFindEntity;
	}
	
	public static function getAutocompleteTipoEncomienda(TipoEncomienda $tipoEncomienda, $required_msg="", $inputId='autocomplete_tipoEncomienda', $inputName='autocomplete_tipoEncomienda', $fCallback="autocomplete_tipoEncomienda_change") {

		$autocomplete = new CMPTipoEncomiendaAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
	public static function getFindEncomienda(Encomienda $encomienda, $label, $required_msg="", $inputId='encomienda_oid', $inputName='encomienda.oid', $fCallback="encomienda_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($encomienda->getOid(), $label, $inputId, $inputName, self::getAutocompleteEncomienda($encomienda), get_class(ManagerFactory::getEncomiendaManager()), "CMPEncomiendaPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,numero');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	public static function getFindEncomiendaWithAdd(Encomienda $encomienda, $required_msg="", $inputId='encomienda_oid', $inputName='encomienda.oid', $fCallback="encomienda_change") {

		$oFindEntity = self::getFindEncomienda($encomienda, $required_msg, $inputId, $inputName, $fCallback);
		$oFindEntity->getInput()->setAddEntityAction("add_encomienda_popup_init");
		//$oFindEntity->getInput()->setTitleAddEntity("Agregar nueva tipoTitulo");
		return $oFindEntity;
	}
	
	public static function getAutocompleteEncomienda(Encomienda $encomienda, $required_msg="", $inputId='autocomplete_encomienda', $inputName='autocomplete_encomienda', $fCallback="autocomplete_encomienda_change") {

		$autocomplete = new CMPEncomiendaAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
	public static function getFindConcepto(Concepto $concepto, $label, $required_msg="", $inputId='concepto_oid', $inputName='concepto.oid', $fCallback="concepto_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($concepto->getOid(), $label, $inputId, $inputName, self::getAutocompleteConcepto($concepto), get_class(ManagerFactory::getConceptoManager()), "CMPConceptoPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,nombre');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	public static function getFindConceptoWithAdd(Concepto $concepto, $required_msg="", $inputId='concepto_oid', $inputName='concepto.oid', $fCallback="concepto_change") {

		$oFindEntity = self::getFindConcepto($concepto, $required_msg, $inputId, $inputName, $fCallback);
		$oFindEntity->getInput()->setAddEntityAction("add_concepto_popup_init");
		//$oFindEntity->getInput()->setTitleAddEntity("Agregar nueva concepto");
		return $oFindEntity;
	}
	
	public static function getAutocompleteConcepto(Concepto $concepto, $required_msg="", $inputId='autocomplete_concepto', $inputName='autocomplete_concepto', $fCallback="autocomplete_concepto_change") {

		$autocomplete = new CMPConceptoAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
}
?>