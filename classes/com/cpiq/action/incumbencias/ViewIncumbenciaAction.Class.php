<?php

/**
 * Acción para visualizar un incumbencia.
 *
 * @author Marcos
 * @since 26-09-2013
 *
 */
class ViewIncumbenciaAction extends UpdateIncumbenciaInitAction {



	protected function parseEntity($entity, XTemplate $xtpl) {

		$this->getForm()->setIsEditable( false );

		parent::parseEntity($entity, $xtpl);
		
		$xtpl->assign('fechaUltModificacion_label', CPIQ_LBL_TITULO_FECHA_ULTIMA_MODIFICACION);
		$xtpl->assign('input_fechaUltModificacion', 'fechaUltModificacion');
		$xtpl->assign('fechaUltModificacion_value', CPIQUtils::formatDateTimeToView($entity->getFechaUltModificacion()));
		$xtpl->assign('usuario_label', CPIQ_LBL_TITULO_USUARIO_ULTIMA_MODIFICACION);
		$xtpl->assign('input_usuario', 'user_oid');
		$xtpl->assign('usuario_value', $entity->getUser()->getDs_username());
		$this->parseIncumbenciaTipoTitulo($entity->getOid(), $xtpl);
		$this->parseIncumbenciaRegistro($entity->getOid(), $xtpl);
		
	}
	
	private function parseIncumbenciaTipoTitulo( $incumbencia_oid, XTemplate $xtpl ){
		$manager = ManagerFactory::getIncumbenciaTipoTituloManager();
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('incumbencia_oid', $incumbencia_oid, '=');
		$entities = $manager->getEntities($oCriteria);
		$xtpl->assign ( 'tiposTitulo_leyenda', CPIQ_MSG_INCUMBENCIA_TIPO_TITULO_TITLE_LIST);
		
		
		$xtpl->assign ( 'lbl_tipoTitulo', CPIQ_LBL_TIPO_TITULO );
		
		
		$xtpl->assign ( 'lbl_ult_modificacion', CPIQ_LBL_REGISTRO_CUOTA_FECHA_ULTIMA_MODIFICACION);
		$xtpl->assign ( 'lbl_usuario', CPIQ_LBL_REGISTRO_CUOTA_USUARIO_ULTIMA_MODIFICACION );
		
		
		foreach ($entities as $oEntity) {
			
			
			
			$xtpl->assign ( 'tipoTitulo', $oEntity->getTipoTitulo()->getNombre() );
			
			
			$xtpl->assign ( 'ult_modificacion', CPIQUtils::formatDateTimeToView($oEntity->getFechaUltModificacion()) );
			$xtpl->assign ( 'usuario', $oEntity->getUser()->getDs_username()); 
			
			
			$xtpl->parse( 'main.incumbenciaTipoTitulo' );
		}
		
		
		
	}
	
	private function parseIncumbenciaRegistro( $incumbencia_oid, XTemplate $xtpl ){
		$manager = ManagerFactory::getIncumbenciaRegistroManager();
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('incumbencia_oid', $incumbencia_oid, '=');
		$entities = $manager->getEntities($oCriteria);
		$xtpl->assign ( 'registros_leyenda', CPIQ_MSG_INCUMBENCIA_REGISTRO_TITLE_LIST);
		
		
		$xtpl->assign ( 'lbl_registro', CPIQ_LBL_REGISTRO );
		
		
		$xtpl->assign ( 'lbl_ult_modificacion', CPIQ_LBL_REGISTRO_CUOTA_FECHA_ULTIMA_MODIFICACION);
		$xtpl->assign ( 'lbl_usuario', CPIQ_LBL_REGISTRO_CUOTA_USUARIO_ULTIMA_MODIFICACION );
		
		
		foreach ($entities as $oEntity) {
			
			
			
			$xtpl->assign ( 'registro', $oEntity->getRegistro()->getNombre() );
			
			
			$xtpl->assign ( 'ult_modificacion', CPIQUtils::formatDateTimeToView($oEntity->getFechaUltModificacion()) );
			$xtpl->assign ( 'usuario', $oEntity->getUser()->getDs_username()); 
			
			
			$xtpl->parse( 'main.incumbenciaRegistro' );
		}
		
		
		
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getLayout();
	 */
	protected function getLayout() {
		$oLayout = new CdtLayoutBasicAjax();
		return $oLayout;
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle() {
		return CPIQ_MSG_INCUMBENCIA_TITLE_VIEW;
	}

	/**
     * (non-PHPdoc)
     * @see CdtEditInitAction::getXTemplate();
     */
    protected function getXTemplate() {
        return new XTemplate(CPIQ_MATRICULADOS_TEMPLATE_INCUMBENCIA_VIEW);
    }	
}