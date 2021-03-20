<?php

/**
 * Acción para actualizar una cuota
 *
 * @author Marcos
 * @since 27-06-2013
 *
 */
class UpdateCuotaAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPCuotaForm();
	}

	public function getNewEntityInstance(){
		$oCuota = new Cuota();
		$oUser = CdtSecureUtils::getUserLogged();
		$oCuota->setUser($oUser);
		$oCuota->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oCuota;
	}

	protected function getEntityManager(){
		return ManagerFactory::getCuotaManager();
	}

	/*
	 protected function getInfoMessage( $entity, $result ){
		$msg = "El cliente " . $entity->getNombre() . " fue actualizado satisfactoriamente";
		CdtUtils::setRequestInfo(1, $msg);
		return $msg;
		}*/

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_cuota_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_cuota_error';
	}

	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity() {
	
		$cuota = parent::getEntity();
	
		$helper = new CMPCuotaFormHelper();
		$helper->fillEntityValues();
	
		$valoresCuota = $helper->getValores();
	
		return array( "cuota" =>$cuota, "valores_cuota" => $valoresCuota);
	}
	
	protected function edit( $entity ){
	
		$cuota = $entity["cuota"];
		$valoresCuota = $entity["valores_cuota"];
	
		$result = parent::edit( $cuota);
	
		$this->getEntityManager()->updateValoresCuota( $valoresCuota );
	
		return $result;
	}


}
