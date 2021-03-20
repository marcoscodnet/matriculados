<?php

/**
 * Acción para visualizar un registro.
 *
 * @author Marcos
 * @since 04-07-2013
 *
 */
class ViewRegistroAction extends UpdateRegistroInitAction {



	protected function parseEntity($entity, XTemplate $xtpl) {

		$this->getForm()->setIsEditable( false );

		parent::parseEntity($entity, $xtpl);
		
		$xtpl->assign('fechaUltModificacion_label', CPIQ_LBL_TITULO_FECHA_ULTIMA_MODIFICACION);
		$xtpl->assign('input_fechaUltModificacion', 'fechaUltModificacion');
		$xtpl->assign('fechaUltModificacion_value', CPIQUtils::formatDateTimeToView($entity->getFechaUltModificacion()));
		$xtpl->assign('usuario_label', CPIQ_LBL_TITULO_USUARIO_ULTIMA_MODIFICACION);
		$xtpl->assign('input_usuario', 'user_oid');
		$xtpl->assign('usuario_value', $entity->getUser()->getDs_username());
		$this->parseRegistroCuota($entity->getOid(), $xtpl);
		
	}
	
private function parseRegistroCuota( $registro_oid, XTemplate $xtpl ){
		$manager = ManagerFactory::getRegistroCuotaManager();
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('registro_oid', $registro_oid, '=');
		$entities = $manager->getEntities($oCriteria);
		$xtpl->assign ( 'cuotas_leyenda', CPIQ_MSG_REGISTRO_CUOTA_TITLE_LIST);
		
		
		$xtpl->assign ( 'lbl_year', CPIQ_LBL_REGISTRO_CUOTA_YEAR );
		$xtpl->assign ( 'lbl_importe', CPIQ_LBL_REGISTRO_CUOTA_IMPORTE );
		
		$xtpl->assign ( 'lbl_ult_modificacion', CPIQ_LBL_REGISTRO_CUOTA_FECHA_ULTIMA_MODIFICACION);
		$xtpl->assign ( 'lbl_usuario', CPIQ_LBL_REGISTRO_CUOTA_USUARIO_ULTIMA_MODIFICACION );
		
		
		foreach ($entities as $oEntity) {
			
			
			
			$xtpl->assign ( 'year', $oEntity->getYear() );
			$xtpl->assign ( 'importe', $oEntity->getImporte() );
			
			$xtpl->assign ( 'ult_modificacion', CPIQUtils::formatDateTimeToView($oEntity->getFechaUltModificacion()) );
			$xtpl->assign ( 'usuario', $oEntity->getUser()->getDs_username()); 
			
			
			$xtpl->parse( 'main.registroCuota' );
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
		return CPIQ_MSG_REGISTRO_TITLE_VIEW;
	}

	/**
     * (non-PHPdoc)
     * @see CdtEditInitAction::getXTemplate();
     */
    protected function getXTemplate() {
        return new XTemplate(CPIQ_MATRICULADOS_TEMPLATE_REGISTRO_VIEW);
    }	
}