<?php

/**
 * Acción para visualizar un matriculado.
 *
 * @author Bernardo
 * @since 23-05-2013
 *
 */
class ViewMatriculadoAction extends UpdateMatriculadoInitAction {



	protected function parseEntity($entity, XTemplate $xtpl) {

		$this->getForm()->setIsEditable( false );

		parent::parseEntity($entity, $xtpl);
		
		$xtpl->assign('fechaUltModificacion_label', CPIQ_LBL_MATRICULADO_FECHA_ULTIMA_MODIFICACION);
		$xtpl->assign('input_fechaUltModificacion', 'fechaUltModificacion');
		$xtpl->assign('fechaUltModificacion_value', CPIQUtils::formatDateTimeToView($entity->getFechaUltModificacion()));
		$xtpl->assign('usuario_label', CPIQ_LBL_MATRICULADO_USUARIO_ULTIMA_MODIFICACION);
		$xtpl->assign('input_usuario', 'user_oid');
		$xtpl->assign('usuario_value', $entity->getUser()->getDs_username());
		$this->parseHistoricoEstado($entity->getOid(), $xtpl);
		$this->parseTitulo($entity->getOid(), $xtpl);
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getLayout();
	 */
	/*protected function getLayout() {
		$oLayout = new CdtLayoutBasicAjax();
		return $oLayout;
	}*/

	private function parseHistoricoEstado( $matriculado_oid, XTemplate $xtpl ){
		$manager = ManagerFactory::getHistoricoEstadoManager();
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('matriculado_oid', $matriculado_oid, '=');
		$entities = $manager->getEntities($oCriteria);
		$xtpl->assign ( 'estado_leyenda', CPIQ_LBL_HISTORICO_ESTADO);
		//$xtpl->assign ( 'lbl_matriculado', RAFAM_LBL_CURRENTACCOUNT_NRO_INMUEBLE );
		$xtpl->assign ( 'lbl_estado', CPIQ_LBL_HISTORICO_ESTADO_ESTADO);
		$xtpl->assign ( 'lbl_desde', CPIQ_LBL_HISTORICO_ESTADO_FECHA_DESDE );
		$xtpl->assign ( 'lbl_hasta', CPIQ_LBL_HISTORICO_ESTADO_FECHA_HASTA );
		$xtpl->assign ( 'lbl_motivo', CPIQ_LBL_HISTORICO_ESTADO_MOTIVO );
		$xtpl->assign ( 'lbl_ult_modificacion', CPIQ_LBL_HISTORICO_ESTADO_FECHA_ULTIMA_MODIFICACION);
		$xtpl->assign ( 'lbl_usuario', CPIQ_LBL_HISTORICO_ESTADO_USUARIO_ULTIMA_MODIFICACION );
		
		
		foreach ($entities as $oEntity) {
			
			
			$xtpl->assign ( 'estado', $oEntity->getEstadoMatriculado()->getNombre() );
			$xtpl->assign ( 'desde', CPIQUtils::formatDateTimeToView($oEntity->getFechaDesde()) );
			$xtpl->assign ( 'hasta', CPIQUtils::formatDateTimeToView($oEntity->getFechaHasta()) );
			$xtpl->assign ( 'motivo', $oEntity->getMotivo() );
			$xtpl->assign ( 'ult_modificacion', CPIQUtils::formatDateTimeToView($oEntity->getFechaUltModificacion()) );
			$xtpl->assign ( 'usuario', $oEntity->getUser()->getDs_username()); 
			
			
			$xtpl->parse( 'main.historicoEstado' );
		}
		
		
		
	}
	
	private function parseTitulo( $matriculado_oid, XTemplate $xtpl ){
		$manager = ManagerFactory::getTituloManager();
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('matriculado_oid', $matriculado_oid, '=');
		$entities = $manager->getEntities($oCriteria);
		$xtpl->assign ( 'titulos_leyenda', CPIQ_LBL_TITULOS);
		//$xtpl->assign ( 'lbl_matriculado', RAFAM_LBL_CURRENTACCOUNT_NRO_INMUEBLE );
		$xtpl->assign ( 'lbl_matricula', CPIQ_LBL_TITULO_MATRICULA);
		$xtpl->assign ( 'lbl_tipo_titulo', CPIQ_LBL_TITULO_TIPO_TITULO );
		$xtpl->assign ( 'lbl_entidad_emisora', CPIQ_LBL_TITULO_ENTIDAD_EMISORA );
		$xtpl->assign ( 'lbl_expedicion', CPIQ_LBL_TITULO_FECHA_EXPEDICION );
		$xtpl->assign ( 'lbl_matriculacion', CPIQ_LBL_TITULO_FECHA_MATRICULACION);
		$xtpl->assign ( 'lbl_principal', CPIQ_LBL_TITULO_PRINCIPAL );
		
		
		foreach ($entities as $oEntity) {
			
			
			$xtpl->assign ( 'matricula', $oEntity->getMatricula() );
			$xtpl->assign ( 'tipoTitulo', $oEntity->getTipoTitulo()->getNombre() );
			$xtpl->assign ( 'entidadEmisora', $oEntity->getEntidadEmisora()->getNombre() );
			$xtpl->assign ( 'fechaExpedicion', CPIQUtils::formatDateToView($oEntity->getFechaExpedicion()) );
			$xtpl->assign ( 'fechaMatriculacion', CPIQUtils::formatDateToView($oEntity->getFechaMatriculacion()) );
			$img_si = ($oEntity->getTituloPrincipal())?'<img title="" src="css/smile/images/chk_on.png"/>':''; 
			$xtpl->assign ( 'esPrincipal', $img_si );
			
			
			
			$xtpl->parse( 'main.titulo' );
		}
		
		
		
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle() {
		return CPIQ_MSG_MATRICULADO_TITLE_VIEW;
	}

	/**
     * (non-PHPdoc)
     * @see CdtEditInitAction::getXTemplate();
     */
    protected function getXTemplate() {
        return new XTemplate(CPIQ_MATRICULADOS_TEMPLATE_MATRICULADO_VIEW);
    }	
}