<?php

/**
 * Acción para visualizar un registro cuota.
 *
 * @author Marcos
 * @since 04-07-2013
 *
 */
class ViewRegistroCuotaAction extends UpdateRegistroCuotaInitAction {



	protected function parseEntity($entity, XTemplate $xtpl) {

		$this->getForm()->setIsEditable( false );

		parent::parseEntity($entity, $xtpl);
		
		$xtpl->assign('fechaUltModificacion_label', CPIQ_LBL_REGISTRO_CUOTA_FECHA_ULTIMA_MODIFICACION);
		$xtpl->assign('input_fechaUltModificacion', 'fechaUltModificacion');
		$xtpl->assign('fechaUltModificacion_value', CPIQUtils::formatDateTimeToView($entity->getFechaUltModificacion()));
		$xtpl->assign('usuario_label', CPIQ_LBL_REGISTRO_CUOTA_USUARIO_ULTIMA_MODIFICACION);
		$xtpl->assign('input_usuario', 'user_oid');
		$xtpl->assign('usuario_value', $entity->getUser()->getDs_username());
		
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
		return CPIQ_MSG_REGISTRO_CUOTA_TITLE_VIEW;
	}

	/**
     * (non-PHPdoc)
     * @see CdtEditInitAction::getXTemplate();
     */
    protected function getXTemplate() {
        return new XTemplate(CPIQ_MATRICULADOS_TEMPLATE_TITULO_VIEW);
    }	
}