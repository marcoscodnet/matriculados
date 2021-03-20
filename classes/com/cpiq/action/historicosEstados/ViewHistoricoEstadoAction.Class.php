<?php

/**
 * Acción para visualizar un registro matriculado.
 *
 * @author Marcos
 * @since 20-09-2013
 *
 */
class ViewRegistroMatriculadoAction extends UpdateRegistroMatriculadoInitAction {



	protected function parseEntity($entity, XTemplate $xtpl) {

		$this->getForm()->setIsEditable( false );

		parent::parseEntity($entity, $xtpl);
		
		$xtpl->assign('fechaUltModificacion_label', CPIQ_LBL_REGISTRO_MATRICULADO_FECHA_ULTIMA_MODIFICACION);
		$xtpl->assign('input_fechaUltModificacion', 'fechaUltModificacion');
		$xtpl->assign('fechaUltModificacion_value', CPIQUtils::formatDateTimeToView($entity->getFechaUltModificacion()));
		$xtpl->assign('usuario_label', CPIQ_LBL_REGISTRO_MATRICULADO_USUARIO_ULTIMA_MODIFICACION);
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
		return CPIQ_MSG_REGISTRO_MATRICULADO_TITLE_VIEW;
	}

	/**
     * (non-PHPdoc)
     * @see CdtEditInitAction::getXTemplate();
     */
    protected function getXTemplate() {
        return new XTemplate(CPIQ_MATRICULADOS_TEMPLATE_TITULO_VIEW);
    }	
}