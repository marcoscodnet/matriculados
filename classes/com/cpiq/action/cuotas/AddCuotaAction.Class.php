<?php

/**
 * Acción para dar de alta una cuota
 *
 * @author Marcos
 * @since 27-06-2013
 *
 */
class AddCuotaAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPCuotaForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
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
		
		$this->getEntityManager()->addValoresCuota( $cuota, $valoresCuota );
		
		return $result;
	}
	
}
