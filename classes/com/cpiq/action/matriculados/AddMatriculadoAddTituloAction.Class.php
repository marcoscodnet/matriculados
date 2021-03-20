<?php

/**
 * Acción para dar de alta un título
 *
 * @author Marcos
 * @since 31-07-2013
 *
 */
class AddMatriculadoAddTituloAction extends AddTituloAction{

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $entity ){
		$this->getEntityManager()->add( $entity );
		$result["oid"] = $entity->getOid();	
		$result["matriculado_oid"] = $entity->getMatriculado()->getOid();		
		$result["action"] = 'list_cuotasGenerada';	
		$result["cartel"] = CPIQ_MSG_AGREGAR_OTRO_TITULO;
		$result["confirmacion"] = CDT_SECURE_MSG_CONFIRM_DELETE_TITLE;	
		return $result;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		$form = new CMPTituloForm($action);
		$form->setOnSuccessCallback("miSuccess");
		
		return $form;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oTitulo = new Titulo();
		$oUser = CdtSecureUtils::getUserLogged();
		$oTitulo->setUser($oUser);
		$oTitulo->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oTitulo;
	}

	protected function getEntityManager(){
		return ManagerFactory::getTituloManager();
	}



	/*
	 protected function getInfoMessage( $entity, $result ){
		$msg = "El cliente " . $entity->getNombre() . " fue agregado satisfactoriamente";
		CdtUtils::setRequestInfo(1, $msg);
		return $msg;
		}*/


}
