<?php

/**
 * Acción para dar de alta un matriculado
 *
 * @author Bernardo
 * @since 23-05-2013
 *
 */
class AddMatriculadoAction extends AddEntityAction{

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $entity ){
		$this->getEntityManager()->add( $entity );
		$result["oid"] = $entity->getOid();		
		$result["action"] = 'add_matriculado_add_titulo_init';		
		return $result;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		$form = new CMPMatriculadoForm();
		$form->setOnSuccessCallback("miSuccess");
		return $form;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oMatriculado = new Matriculado();
		$oUser = CdtSecureUtils::getUserLogged();
		$oMatriculado->setUser($oUser);
		$oMatriculado->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oMatriculado;
	}

	protected function getEntityManager(){
		return ManagerFactory::getMatriculadoManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'add_matriculado_success';
	
	}
	/*
	 protected function getInfoMessage( $entity, $result ){
		$msg = "El cliente " . $entity->getNombre() . " fue agregado satisfactoriamente";
		CdtUtils::setRequestInfo(1, $msg);
		return $msg;
		}*/


}
