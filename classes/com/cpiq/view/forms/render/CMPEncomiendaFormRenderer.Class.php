<?php

/**
 * Implementación para renderizar un formulario de encomienda 
 *
 * @author Bernardo Iribarne (bernardo.iribarne@codnet.com.ar)
 * @since 08-10-2013
 *
 */
class CMPEncomiendaFormRenderer extends DefaultFormRenderer {

	protected function getXTemplate() {
    	    	
    	return new XTemplate( CDT_CMP_TEMPLATE_FORM );
    }
	
	protected function renderFieldset(CMPForm $form, XTemplate $xtpl){

		
		foreach ($form->getFieldsets() as $fieldset) {	
			//legend
			$legend = $fieldset->getLegend();
			if(!empty($legend)){
				$xtpl->assign("value", $legend);
				$xtpl->parse("main.fieldset.legend");
			}
			
			
			
			
			
			foreach ($fieldset->getFieldsColumns() as $column => $fields) {
				
				foreach ($fields as $formField) {
					
					$input = $formField->getInput();
					$label = $formField->getLabel();
					
					$this->renderLabel( $label, $input, $xtpl );
					$this->renderInput( $input, $xtpl );
					$xtpl->assign("minWidth", $formField->getMinWidth());
					
					if( $input->getIsVisible() ){
						$xtpl->assign("display", 'block');
						
					}
					else $xtpl->assign("display", 'none');
					
					$xtpl->parse("main.fieldset.column.field");
				}
				$xtpl->parse("main.fieldset.column");
			}
			
			
			$xtpl->parse("main.fieldset");
		}
		
	}
	
	
	protected function renderCustom(CMPForm $form, XTemplate $xtpl){
		
		
		//renderizamos las relaciones con sus formularios de alta
		
		$xtpl_relaciones = new XTemplate( CPIQ_TEMPLATE_ENCOMIENDA_EDIT_ENCOMIENDA_RELACIONES );
		
		//profesionales
		$profesionalesHTML = $this->getHTMLProfesionales($form);
		$xtpl_relaciones->assign( "profesionales_tab", CPIQ_LBL_ENCOMIENDA_PROFESIONALES );
		$xtpl_relaciones->assign( "profesionales", $profesionalesHTML );
		
		//registros
		$registrosHTML = $this->getHTMLRegistros($form);
		$xtpl_relaciones->assign( "registros_tab", CPIQ_LBL_ENCOMIENDA_REGISTROS );
		$xtpl_relaciones->assign( "registros", $registrosHTML );
		
		//especialidades
		$especialidadesHTML = $this->getHTMLEspecialidades($form);
		$xtpl_relaciones->assign( "especialidades_tab", CPIQ_LBL_ENCOMIENDA_ESPECIALIDADES );
		$xtpl_relaciones->assign( "especialidades", $especialidadesHTML );
		
		$xtpl_relaciones->parse("main");
		
		
		//$xtpl->assign( "customHTML", $profesionalesHTML . $registrosHTML . $especialidadesHTML);
		$xtpl->assign( "customHTML", $xtpl_relaciones->text("main").$form->getCustomHTML());
	}	
	
	/**
	 * renderizamos en el formulario de encomienda los profesionales que tiene asignados.
	 * También agregamos un formulario para asignar nuevos profesionales.
	 * 
	 * @param CMPForm $form
	 * @param XTemplate $xtpl
	 */
	protected function getHTMLProfesionales(CMPForm $form){	

		$xtpl_profesionales = new XTemplate( CPIQ_TEMPLATE_ENCOMIENDA_EDIT_PROFESIONALES );
		
		//mostrar los profesionales actuales.
		$xtpl_profesionales->assign('profesionales_title', CPIQ_MSG_ENCOMIENDA_PROFESIONALES );
		
    	//TODO parsear labels.
    	$this->parseProfesionalesLabels($xtpl_profesionales);
    	
		//recuperamos los profesionales de la encomienda desde la sesión.
		$manager = new EncomiendaProfesionalSessionManager();
    	$profesionales = $manager->getEntities( new CdtSearchCriteria() );
    	
    	//parseamos los profesionales.
    	$this->parseProfesionales($profesionales, $form, $xtpl_profesionales);
    	
    	//formulario para agregar un nuevo profesional a la encomienda.
    	if( $form->getIsEditable() ){
    		$profesionalForm = new CMPEncomiendaProfesionalForm();
			$xtpl_profesionales->assign('formulario', $profesionalForm->show() );
    	}
		$xtpl_profesionales->parse("main");
		
		return $xtpl_profesionales->text("main") ;

	}

	/**
	 * armamos un array con los datos del profesional.
	 * @param EncomiendaProfesional $profesional
	 */
	public function buildArrayProfesional(EncomiendaProfesional $profesional){

		$array_profesional = array();
		
		$array_profesional["item_oid"] = $profesional->getProfesional();
		$array_profesional["consejo"] = $profesional->getConsejo();
		$array_profesional["profesional"] = $profesional->getProfesional();
		$array_profesional["matricula"] = $profesional->getMatricula();
		
		return $array_profesional;
		
	}
	/**
	 * columnas para el listado de profesionales
	 * @return multitype:string
	 */	
	public function getProfesionalColumns(){
		return array( "consejo","profesional", "matricula");
	}
	
	/**
	 * labels para el listado de profesionales
	 * @return multitype:string
	 */
	public function getProfesionalColumnsLabels(){
		return array( CPIQ_LBL_ENCOMIENDA_PROFESIONALES_CONSEJO, CPIQ_LBL_ENCOMIENDA_PROFESIONALES_PROFESIONAL, CPIQ_LBL_ENCOMIENDA_PROFESIONALES_MATRICULA);
	}
	
	/**
	 * aligns para las columnas del listado de profesionales.
	 * @return multitype:string
	 */
	public function getProfesionalColumnsAlign(){
		return array( "left", "left", "left");
	}
			
	/**
	 * parseamos los labels para el listado de profesionales.
	 * @param XTemplate $xtpl_profesionales
	 */
	protected function parseProfesionalesLabels(XTemplate $xtpl_profesionales){
	
		$aligns = $this->getProfesionalColumnsAlign();
	
		$index=0;
		foreach ( $this->getProfesionalColumnsLabels() as $label) {
				
			$xtpl_profesionales->assign('profesional_label', $label );
			$xtpl_profesionales->assign('align', $aligns[$index]);
			$xtpl_profesionales->parse('main.profesional_th');
				
			$index++;
		}
	}
	
	
	/**
	 * parseamos el listado de profesionales.
	 * @param ItemCollection $profesionales
	 * @param CMPForm $form
	 * @param XTemplate $xtpl_profesionales
	 */
	protected function parseProfesionales(ItemCollection $profesionales=null, CMPForm $form, XTemplate $xtpl_profesionales){
	
		if( $profesionales!= null ){
			foreach ($profesionales as $profesional) {
		   
				$this->parseProfesional($profesional, $xtpl_profesionales);
		   
				if( $form->getIsEditable() ){
					$xtpl_profesionales->assign('item_oid',$profesional->getProfesional());
					$xtpl_profesionales->parse("main.profesional.editar_profesional");
				}
		   
				$xtpl_profesionales->parse("main.profesional");
			}
		}
	}
	
	/**
	 * parseamos un profesional.
	 * @param EncomiendaProfesional $profesional
	 * @param XTemplate $xtpl_profesionales
	 */
	protected function parseProfesional(EncomiendaProfesional $profesional, XTemplate $xtpl_profesionales){
	
		$columns = $this->getProfesionalColumns();
		$aligns = $this->getProfesionalColumnsAlign();
		$array_profesional = $this->buildArrayProfesional($profesional);
	
		$index=0;
		foreach ($columns as $column) {
	
			$xtpl_profesionales->assign('data', $array_profesional[$column] );
			$xtpl_profesionales->assign('align', $aligns[$index]);
			$xtpl_profesionales->parse('main.profesional.profesional_data');
	
			$index++;
		}
	
	}

	
	/**
	 * renderizamos en el formulario de encomienda los regitros que tiene asignados.
	 * También agregamos un formulario para asignar nuevos registros.
	 *
	 * @param CMPForm $form
	 * @param XTemplate $xtpl
	 */
	protected function getHTMLRegistros(CMPForm $form){
	
		$xtpl_registros = new XTemplate( CPIQ_TEMPLATE_ENCOMIENDA_EDIT_REGISTROS );
	
		//mostrar los registros actuales.
		$xtpl_registros->assign('registros_title', CPIQ_MSG_ENCOMIENDA_REGISTROS );
	
		//TODO parsear labels.
		$this->parseRegistrosLabels($xtpl_registros);
		 
		//recuperamos los registros de la encomienda desde la sesión.
		$manager = new EncomiendaRegistroSessionManager();
		$registros = $manager->getEntities( new CdtSearchCriteria() );
		 
		//parseamos los registros.
		$this->parseRegistros($registros, $form, $xtpl_registros);
		 
		//formulario para agregar un nuevo registro a la encomienda.
		if( $form->getIsEditable() ){
			$registroForm = new CMPEncomiendaRegistroForm();
			$xtpl_registros->assign('formulario', $registroForm->show() );
		}
		$xtpl_registros->parse("main");
	
		return $xtpl_registros->text("main");
	
	}
	
	/**
	 * armamos un array con los datos del registro.
	 * @param EncomiendaRegistro $registro
	 */
	public function buildArrayRegistro(EncomiendaRegistro $registro){
	
		$array_registro = array();
	
		$array_registro["item_oid"] = $registro->getRegistroMatriculado()->getOid();
		
		
		$managerRegistroMatriculado =  ManagerFactory::getRegistroMatriculadoManager();
		$oRegistroMatriculado = $managerRegistroMatriculado->getObjectByCode($registro->getRegistroMatriculado()->getOid());
		$managerRegistroCuota =  ManagerFactory::getRegistroCuotaManager();
		$oRegistroCuota = $managerRegistroCuota->getObjectByCode($oRegistroMatriculado->getRegistroCuota()->getOid());
		
		$array_registro["registroMatriculado"] = $oRegistroCuota->getRegistro()->getNombre();
	
		return $array_registro;
	
	}
	/**
	 * columnas para el listado de registros
	 * @return multitype:string
	 */
	public function getRegistroColumns(){
		return array( "registroMatriculado");
	}
	
	/**
	 * labels para el listado de registros
	 * @return multitype:string
	 */
	public function getRegistroColumnsLabels(){
		return array( CPIQ_LBL_ENCOMIENDA_REGISTROS_REGISTRO);
	}
	
	/**
	 * aligns para las columnas del listado de registros.
	 * @return multitype:string
	 */
	public function getRegistroColumnsAlign(){
		return array( "left");
	}
		
	/**
	 * parseamos los labels para el listado de registros.
	 * @param XTemplate $xtpl_registros
	 */
	protected function parseRegistrosLabels(XTemplate $xtpl_registros){
	
		$aligns = $this->getRegistroColumnsAlign();
	
		$index=0;
		foreach ( $this->getRegistroColumnsLabels() as $label) {
	
			$xtpl_registros->assign('registro_label', $label );
			$xtpl_registros->assign('align', $aligns[$index]);
			$xtpl_registros->parse('main.registro_th');
	
			$index++;
		}
	}
	
	
	/**
	 * parseamos el listado de registros.
	 * @param ItemCollection $registros
	 * @param CMPForm $form
	 * @param XTemplate $xtpl_registros
	 */
	protected function parseRegistros(ItemCollection $registros=null, CMPForm $form, XTemplate $xtpl_registros){
	
		if( $registros!= null ){
			foreach ($registros as $registro) {
				 
				$this->parseRegistro($registro, $xtpl_registros);
				 
				if( $form->getIsEditable() ){
					$xtpl_registros->assign('item_oid', $registro->getRegistroMatriculado()->getOid());
					$xtpl_registros->parse("main.registro.editar_registro");
				}
				 
				$xtpl_registros->parse("main.registro");
			}
		}
	}
	
	/**
	 * parseamos un registro.
	 * @param EncomiendaRegistro $registro
	 * @param XTemplate $xtpl_registros
	 */
	protected function parseRegistro(EncomiendaRegistro $registro, XTemplate $xtpl_registros){
	
		$columns = $this->getRegistroColumns();
		$aligns = $this->getRegistroColumnsAlign();
		$array_registro = $this->buildArrayRegistro($registro);
	
		$index=0;
		foreach ($columns as $column) {
	
			$xtpl_registros->assign('data', $array_registro[$column] );
			$xtpl_registros->assign('align', $aligns[$index]);
			$xtpl_registros->parse('main.registro.registro_data');
	
			$index++;
		}
	
	}

	
	
	
	/**
	 * renderizamos en el formulario de encomienda las especialidades que tiene asignadas.
	 * También agregamos un formulario para asignar nuevas especialidades.
	 *
	 * @param CMPForm $form
	 * @param XTemplate $xtpl
	 */
	protected function getHTMLEspecialidades(CMPForm $form){
	
		$xtpl_especialidades = new XTemplate( CPIQ_TEMPLATE_ENCOMIENDA_EDIT_ESPECIALIDADES );
	
		//mostrar los especialidades actuales.
		$xtpl_especialidades->assign('especialidades_title', CPIQ_MSG_ENCOMIENDA_ESPECIALIDADES );
	
		//TODO parsear labels.
		$this->parseEspecialidadesLabels($xtpl_especialidades);
		 
		//recuperamos los especialidades de la encomienda desde la sesión.
		$manager = new EncomiendaEspecialidadSessionManager();
		$especialidades = $manager->getEntities( new CdtSearchCriteria() );
		 
		//parseamos los especialidades.
		$this->parseEspecialidades($especialidades, $form, $xtpl_especialidades);
		 
		//formulario para agregar un nuevo especialidad a la encomienda.
		if( $form->getIsEditable() ){
			$especialidadForm = new CMPEncomiendaEspecialidadForm();
			$xtpl_especialidades->assign('formulario', $especialidadForm->show() );
		}
		$xtpl_especialidades->parse("main");
	
		return $xtpl_especialidades->text("main") ;
	
	}
	
	/**
	 * armamos un array con los datos del especialidad.
	 * @param EncomiendaEspecialidad $especialidad
	 */
	public function buildArrayEspecialidad(EncomiendaEspecialidad $especialidad){
	
		$array_especialidad = array();
	
		$array_especialidad["item_oid"] = $especialidad->getTitulo()->getOid();
		
		$managerTitulo =  ManagerFactory::getTituloManager();
		$oTitulo = $managerTitulo->getObjectByCode($especialidad->getTitulo()->getOid());
		$array_especialidad["titulo"] = $oTitulo->getTipoTitulo()->getNombre();
	
		return $array_especialidad;
	
	}
	/**
	 * columnas para el listado de especialidades
	 * @return multitype:string
	 */
	public function getEspecialidadColumns(){
		return array( "titulo");
	}
	
	/**
	 * labels para el listado de especialidades
	 * @return multitype:string
	 */
	public function getEspecialidadColumnsLabels(){
		return array( CPIQ_LBL_ENCOMIENDA_ESPECIALIDADES_TITULO);
	}
	
	/**
	 * aligns para las columnas del listado de especialidades.
	 * @return multitype:string
	 */
	public function getEspecialidadColumnsAlign(){
		return array( "left");
	}
		
	/**
	 * parseamos los labels para el listado de especialidades.
	 * @param XTemplate $xtpl_especialidades
	 */
	protected function parseEspecialidadesLabels(XTemplate $xtpl_especialidades){
	
		$aligns = $this->getEspecialidadColumnsAlign();
	
		$index=0;
		foreach ( $this->getEspecialidadColumnsLabels() as $label) {
	
			$xtpl_especialidades->assign('especialidad_label', $label );
			$xtpl_especialidades->assign('align', $aligns[$index]);
			$xtpl_especialidades->parse('main.especialidad_th');
	
			$index++;
		}
	}
	
	
	/**
	 * parseamos el listado de especialidades.
	 * @param ItemCollection $especialidades
	 * @param CMPForm $form
	 * @param XTemplate $xtpl_especialidades
	 */
	protected function parseEspecialidades(ItemCollection $especialidades=null, CMPForm $form, XTemplate $xtpl_especialidades){
	
		if( $especialidades!= null ){
			foreach ($especialidades as $especialidad) {
				 
				$this->parseEspecialidad($especialidad, $xtpl_especialidades);
				 
				if( $form->getIsEditable() ){
					$xtpl_especialidades->assign('item_oid', $especialidad->getTitulo()->getOid());
					$xtpl_especialidades->parse("main.especialidad.editar_especialidad");
				}
				 
				$xtpl_especialidades->parse("main.especialidad");
			}
		}
	}
	
	/**
	 * parseamos un especialidad.
	 * @param EncomiendaEspecialidad $especialidad
	 * @param XTemplate $xtpl_especialidades
	 */
	protected function parseEspecialidad(EncomiendaEspecialidad $especialidad, XTemplate $xtpl_especialidades){
	
		$columns = $this->getEspecialidadColumns();
		$aligns = $this->getEspecialidadColumnsAlign();
		$array_especialidad = $this->buildArrayEspecialidad($especialidad);
	
		$index=0;
		foreach ($columns as $column) {
	
			$xtpl_especialidades->assign('data', $array_especialidad[$column] );
			$xtpl_especialidades->assign('align', $aligns[$index]);
			$xtpl_especialidades->parse('main.especialidad.especialidad_data');
	
			$index++;
		}
	
	}
	
}