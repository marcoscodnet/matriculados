<?php

/**
 * Manager para Registro Matriculado
 *  
 * @author Marcos
 * @since 20-03-2017
 */
class RegistroCuotaMatriculadoManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getRegistroCuotaMatriculadoDAO();
	}

	public function add(Entity $entity) {
    	/*$managerRegistroCuota =  ManagerFactory::getRegistroCuotaManager();
		$registroCuota = $managerRegistroCuota->getObjectByCode($entity->getRegistroCuota()->getOid());
		
		$oUser = CdtSecureUtils::getUserLogged();
		
		$managerMovCtaCte =  ManagerFactory::getMovCtaCteManager();
		
		$oMovCtaCteDeuda = new MovCtaCte();
		$oConcepto = new Concepto();
		$oConcepto->setOid(CPIQ_CONCEPTO_DEUDA_REGISTRO_MATRICULADO);
		$oMovCtaCteDeuda->setConcepto($oConcepto);
		$oMovCtaCteDeuda->setFechaCarga(date(DB_DEFAULT_DATETIME_FORMAT));
		$oMovCtaCteDeuda->setMatriculado($entity->getMatriculado());
		$oMovCtaCteDeuda->setImporte($registroCuota->getImporte());
		$oMovCtaCteDeuda->setUser($oUser);
		$oMovCtaCteDeuda->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		$managerMovCtaCte->add($oMovCtaCteDeuda);
		$entity->setMovCtaCteDeuda($oMovCtaCteDeuda);
		
		$oMovCtaCte = new MovCtaCte();
		$oConcepto = new Concepto();
		$oConcepto->setOid(CPIQ_CONCEPTO_PAGO_REGISTRO_MATRICULADO);
		$oMovCtaCte->setConcepto($oConcepto);
		$oMovCtaCte->setFechaCarga(date(DB_DEFAULT_DATETIME_FORMAT));
		$oMovCtaCte->setMatriculado($entity->getMatriculado());
		$oMovCtaCte->setImporte($registroCuota->getImporte());
		$oMovCtaCte->setUser($oUser);
		$oMovCtaCte->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		$managerMovCtaCte->add($oMovCtaCte);
		
		$entity->setRegistroCuota($registroCuota);
		$entity->setMovCtaCte($oMovCtaCte);
		
		
		
		$managerMovCaja =  ManagerFactory::getMovCajaManager();
		$oMovCaja = new MovCaja();
		$oMovCaja->setFechaCarga(date(DB_DEFAULT_DATETIME_FORMAT));
		$oMovCaja->setMovCtaCte($oMovCtaCte);
		$oMovCaja->setConcepto($oConcepto);
		
		$oMovCaja->setImporte($registroCuota->getImporte());
		$oMovCaja->setUser($oUser);
		$oMovCaja->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		$managerMovCaja->add($oMovCaja);*/
		
		parent::add($entity);
		
    }	
    
     public function update(Entity $entity) {
     	
     	/*$managerRegistroCuota =  ManagerFactory::getRegistroCuotaManager();
		$registroCuota = $managerRegistroCuota->getObjectByCode($entity->getRegistroCuota()->getOid());
		
		$managerRegistroCuotaMatriculado =  ManagerFactory::getRegistroCuotaMatriculadoManager();
		$entity = $managerRegistroCuotaMatriculado->getObjectByCode($entity->getOid());
		
		$managerMovCtaCte =  ManagerFactory::getMovCtaCteManager();
		$oMovCtaCte = $managerMovCtaCte->getObjectByCode($entity->getMovCtaCte()->getOid());
		
		$oMovCtaCte->setImporte($registroCuota->getImporte());
		$oUser = CdtSecureUtils::getUserLogged();
		$oMovCtaCte->setUser($oUser);
		$oMovCtaCte->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		$managerMovCtaCte->update($oMovCtaCte);
		
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('movCtaCte_oid', $oMovCtaCte->getOid(), '=');
		$managerMovCaja =  ManagerFactory::getMovCajaManager();
		$oMovCaja = $managerMovCaja->getEntity($oCriteria);
		$oMovCaja->setMovCtaCte($oMovCtaCte);
		$oMovCaja->setImporte((-1)*$registroCuota->getImporte());
		$oMovCaja->setUser($oUser);
		$oMovCaja->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		$managerMovCaja->update($oMovCaja);
		
		$oMovCtaCteDeuda = $managerMovCtaCte->getObjectByCode($entity->getMovCtaCteDeuda()->getOid());
		
		$oMovCtaCteDeuda->setImporte((-1)*$registroCuota->getImporte());
		$oMovCtaCteDeuda->setUser($oUser);
		$oMovCtaCteDeuda->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		$managerMovCtaCte->update($oMovCtaCteDeuda);
		
		$entity->setUser($oUser);
		$entity->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		$entity->setRegistroCuota($registroCuota);
		$entity->setMovCtaCte($oMovCtaCte);
		$entity->setMovCtaCteDeuda($oMovCtaCteDeuda);*/
		parent::update($entity);
     }

    
    
    
	/**
     * se elimina la entity
     * @param int identificador de la entity a eliminar.
     */
    public function delete($id) {
        $managerRegistroCuotaMatriculado =  ManagerFactory::getRegistroCuotaMatriculadoManager();
		$oRegistroCuotaMatriculado = $managerRegistroCuotaMatriculado->getObjectByCode($id);
		
		$managerMovCtaCte =  ManagerFactory::getMovCtaCteManager();
		
    	parent::delete( $id );
    	
    	$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('movCtaCte_oid', $oRegistroCuotaMatriculado->getMovCtaCte()->getOid(), '=');
		$managerMovCaja =  ManagerFactory::getMovCajaManager();
		$oMovCaja = $managerMovCaja->getEntity($oCriteria);
    	
		if (!empty($oMovCaja)) {
			if (!$oMovCaja->getAnulacion()) {
				/*$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('anulacion_oid', $oMovCaja->getAnulacion()->getOid(), '=');
				//$managerMovCaja =  ManagerFactory::getMovCajaManager();
				$oMovCajas = $managerMovCaja->getEntities($oCriteria);
				foreach ($oMovCajas as $objCaja) {
					$managerMovCaja->delete($objCaja->getOid());
				}*/
				$managerMovCaja->delete($oMovCaja->getOid());
			}
			
			
		}
		//$managerMovCtaCte =  ManagerFactory::getMovCtaCteManager();
		$oMovCtaCte = $managerMovCtaCte->getObjectByCode($oRegistroCuotaMatriculado->getMovCtaCte()->getOid());
    	if (!$oMovCtaCte->getAnulacion()) {
			/*$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('anulacion_oid', $oMovCtaCte->getAnulacion()->getOid(), '=');
			//$managerMovCaja =  ManagerFactory::getMovCajaManager();
			$oMovCtaCtes = $managerMovCtaCte->getEntities($oCriteria);
			foreach ($oMovCtaCtes as $objCtaCte) {
				$managerMovCtaCte->delete($objCtaCte->getOid());
			}*/
    		$managerMovCtaCte->delete($oRegistroCuotaMatriculado->getMovCtaCte()->getOid());
		}
    	
    	
    	$oMovCtaCteDeuda = $managerMovCtaCte->getObjectByCode($oRegistroCuotaMatriculado->getMovCtaCte()->getOid());
    	if (!$oMovCtaCteDeuda->getAnulacion()) {
			/*$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('anulacion_oid', $oMovCtaCteDeuda->getAnulacion()->getOid(), '=');
			//$managerMovCaja =  ManagerFactory::getMovCajaManager();
			$oMovCtaCteDeudas = $managerMovCtaCte->getEntities($oCriteria);
			foreach ($oMovCtaCteDeudas as $objCtaCteDeuda) {
				$managerMovCtaCte->delete($objCtaCteDeuda->getOid());
			}*/
    		$managerMovCtaCte->delete($oRegistroCuotaMatriculado->getMovCtaCteDeuda()->getOid());
		}
		
    }
	
	
	
	
}
?>
