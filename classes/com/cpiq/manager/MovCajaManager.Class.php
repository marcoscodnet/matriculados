<?php

/**
 * Manager para Mov Caja
 *  
 * @author Marcos
 * @since 01-08-2013
 */
class MovCajaManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getMovCajaDAO();
	}

	public function add(Entity $entity) {
    	parent::add($entity);
	}	
    
   

	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/entities/manager/EntityManager::validateOnDelete()
	 */
	protected function validateOnDelete($id){

		parent::validateOnDelete($id);

		//TODO validaciones para elimninar el matriculado.

	}	
	
	public function anular($id){
		
		$oMovCaja = $this->getObjectByCode($id);
		
		if ($oMovCaja->getAnulacion()->getOid()) {
			throw new GenericException( CPIQ_MSG_MOVCAJA_ANULAR_PROHIBIDO );
		}
		else {
			$oAnulacion = new Anulacion();
			$oAnulacion->setFecha(date(DB_DEFAULT_DATETIME_FORMAT));
			$oUser = CdtSecureUtils::getUserLogged();
			$oAnulacion->setUser($oUser);
			$oAnulacion->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
			$managerAnulacion =  ManagerFactory::getAnulacionManager();
			$managerAnulacion->add($oAnulacion);
			$oConceptoAnulado = new Concepto();
			$oConceptoAnulado->setOid(CPIQ_CONCEPTO_CONTRA_ASIENTO);
			if ($oMovCaja->getMovCtaCte()->getOid()) {
				$managerMovCtaCte =  ManagerFactory::getMovCtaCteManager();
				$oMovCtaCte  = $managerMovCtaCte->getObjectByCode($oMovCaja->getMovCtaCte()->getOid());
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('movCtaCte_oid', $oMovCaja->getMovCtaCte()->getOid(), '=');
				$managerEncomiendaTipoPago =  ManagerFactory::getPagarEncomiendaManager();
				$oEncomiendaTipoPago  = $managerEncomiendaTipoPago->getEntity($oCriteria);
				if (!empty($oEncomiendaTipoPago)) {
					$managerEncomienda =  ManagerFactory::getEncomiendaManager();
					$oEncomienda  = $managerEncomienda->getObjectByCode($oEncomiendaTipoPago->getEncomienda()->getOid());
					$oTipoEstadoEncomienda = new TipoEstadoEncomienda();
					$oTipoEstadoEncomienda->setOid(CPIQ_ESTADO_ENCOMIENDA_ANULADA);
					$managerEncomienda->cambiarEstado($oEncomienda, $oTipoEstadoEncomienda);
					if (($oEncomiendaTipoPago->getMovCtaCteDeuda()->getOid()!=null)) {
						$oMovCtaCteDedua  = $managerMovCtaCte->getObjectByCode($oEncomiendaTipoPago->getMovCtaCteDeuda()->getOid());
						$oMovCtaCteContraAsiento = new MovCtaCte();
						$oMovCtaCteContraAsiento->setConcepto($oConceptoAnulado);
						$oMovCtaCteContraAsiento->setAnulacion($oAnulacion);
						$oMovCtaCteContraAsiento->setMatriculado($oMovCtaCte->getMatriculado());
						$oMovCtaCteContraAsiento->setFechaCarga(date(DB_DEFAULT_DATETIME_FORMAT));
						$oMovCtaCteContraAsiento->setUser($oUser);
						$oMovCtaCteContraAsiento->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
						$managerConcepto =  ManagerFactory::getConceptoManager();
						$oConcepto  = $managerConcepto->getObjectByCode($oMovCtaCteDedua->getConcepto()->getOid());
						$oMovCtaCteContraAsiento->setImporte($oMovCtaCte->getImporte()*$oConcepto->getCoeficiente()*(-1));
						$managerMovCtaCte->add($oMovCtaCteContraAsiento);
						$oMovCtaCteDedua->setUser($oUser);
						$oMovCtaCteDedua->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
						$oMovCtaCteDedua->setAnulacion($oAnulacion);
						$managerMovCtaCte->update($oMovCtaCteDedua);
					}
				}
				$oMovCtaCteContraAsiento = new MovCtaCte();
				$oMovCtaCteContraAsiento->setConcepto($oConceptoAnulado);
				$oMovCtaCteContraAsiento->setAnulacion($oAnulacion);
				$oMovCtaCteContraAsiento->setMatriculado($oMovCtaCte->getMatriculado());
				$oMovCtaCteContraAsiento->setFechaCarga(date(DB_DEFAULT_DATETIME_FORMAT));
				$oMovCtaCteContraAsiento->setUser($oUser);
				$oMovCtaCteContraAsiento->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
				$managerConcepto =  ManagerFactory::getConceptoManager();
				$oConcepto  = $managerConcepto->getObjectByCode($oMovCtaCte->getConcepto()->getOid());
				if ($oMovCtaCteDedua) {
					$oMovCtaCteContraAsiento->setImporte($oMovCtaCteDedua->getImporte()*$oConcepto->getCoeficiente()*(-1));
					$managerMovCtaCte->add($oMovCtaCteContraAsiento);
				}
				
				$oMovCtaCte->setUser($oUser);
				$oMovCtaCte->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
				$oMovCtaCte->setAnulacion($oAnulacion);
				$managerMovCtaCte->update($oMovCtaCte);
				
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('movCtaCte_oid', $oMovCtaCte->getOid(), '=');
				$managerRegistroCuotaMatriculado = ManagerFactory::getRegistroCuotaMatriculadoManager();
				$oRegistroCuotaMatriculado = $managerRegistroCuotaMatriculado->getEntity($oCriteria);
				if ($oRegistroCuotaMatriculado) {
					if (($oRegistroCuotaMatriculado->getMovCtaCteDeuda()->getOid()!=null)) {
						$oMovCtaCteDedua  = $managerMovCtaCte->getObjectByCode($oRegistroCuotaMatriculado->getMovCtaCteDeuda()->getOid());
						$oMovCtaCteContraAsiento = new MovCtaCte();
						$oMovCtaCteContraAsiento->setConcepto($oConceptoAnulado);
						$oMovCtaCteContraAsiento->setAnulacion($oAnulacion);
						$oMovCtaCteContraAsiento->setMatriculado($oMovCtaCte->getMatriculado());
						$oMovCtaCteContraAsiento->setFechaCarga(date(DB_DEFAULT_DATETIME_FORMAT));
						$oMovCtaCteContraAsiento->setUser($oUser);
						$oMovCtaCteContraAsiento->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
						$managerConcepto =  ManagerFactory::getConceptoManager();
						$oConcepto  = $managerConcepto->getObjectByCode($oMovCtaCteDedua->getConcepto()->getOid());
						$oMovCtaCteContraAsiento->setImporte($oMovCtaCteDedua->getImporte()*$oConcepto->getCoeficiente()*(-1));
						$managerMovCtaCte->add($oMovCtaCteContraAsiento);
						$oMovCtaCteDedua->setUser($oUser);
						$oMovCtaCteDedua->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
						$oMovCtaCteDedua->setAnulacion($oAnulacion);
						$managerMovCtaCte->update($oMovCtaCteDedua);
					}
				}
				
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('movCtaCte_oid', $oMovCtaCte->getOid(), '=');
				$managerCuotaGenerada = ManagerFactory::getCuotaGeneradaManager();
				$oCuotaGenerada = $managerCuotaGenerada->getEntity($oCriteria);
				if (($oCuotaGenerada->getMovCtaCteDeuda()->getOid()!=null)) {
					$oMovCtaCteDedua  = $managerMovCtaCte->getObjectByCode($oCuotaGenerada->getMovCtaCteDeuda()->getOid());
					$oMovCtaCteContraAsiento = new MovCtaCte();
					$oMovCtaCteContraAsiento->setConcepto($oConceptoAnulado);
					$oMovCtaCteContraAsiento->setAnulacion($oAnulacion);
					$oMovCtaCteContraAsiento->setMatriculado($oMovCtaCte->getMatriculado());
					$oMovCtaCteContraAsiento->setFechaCarga(date(DB_DEFAULT_DATETIME_FORMAT));
					$oMovCtaCteContraAsiento->setUser($oUser);
					$oMovCtaCteContraAsiento->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
					$managerConcepto =  ManagerFactory::getConceptoManager();
					$oConcepto  = $managerConcepto->getObjectByCode($oMovCtaCteDedua->getConcepto()->getOid());
					$oMovCtaCteContraAsiento->setImporte($oMovCtaCteDedua->getImporte()*$oConcepto->getCoeficiente()*(-1));
					$managerMovCtaCte->add($oMovCtaCteContraAsiento);
					$oMovCtaCteDedua->setUser($oUser);
					$oMovCtaCteDedua->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
					$oMovCtaCteDedua->setAnulacion($oAnulacion);
					$managerMovCtaCte->update($oMovCtaCteDedua);
				}
			}
			$oMovCajaContraAsiento = new MovCaja();
			$oMovCajaContraAsiento->setConcepto($oConceptoAnulado);
			$oMovCajaContraAsiento->setAnulacion($oAnulacion);
			$oMovCajaContraAsiento->setFechaCarga(date(DB_DEFAULT_DATETIME_FORMAT));
			$oMovCajaContraAsiento->setUser($oUser);
			$oMovCajaContraAsiento->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
			$managerConcepto =  ManagerFactory::getConceptoManager();
			$oConcepto  = $managerConcepto->getObjectByCode($oMovCaja->getConcepto()->getOid());
			$oMovCajaContraAsiento->setImporte($oMovCaja->getImporte()*$oConcepto->getCoeficiente()*(-1));
			$oMovCajaContraAsiento->setObservaciones(CPIQ_MSG_MOVCAJA_ANULACION_MOVIMIENTO.' '.$oMovCaja->getOid());
			$this->add($oMovCajaContraAsiento);
			$oMovCaja->setUser($oUser);
			$oMovCaja->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
			$oMovCaja->setAnulacion($oAnulacion);
			$this->update($oMovCaja);
				
		}
			
			
	}
	
}
?>
