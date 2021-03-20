<?php

/**
 * componente grilla para cuotas generadas
 *
 * @author Marcos
 * @since 02-07-2013
 *
 */
class CMPCuotaGeneradaGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();
		
		$filter = new CMPCuotaGeneradaFilter();
		
		$matriculado_oid = CdtUtils::getParam('id');
		//$insert = CdtUtils::getParam('insert');	
		if (!empty( $matriculado_oid )) {
			$matriculado = new Matriculado();
			$matriculado->setOid($matriculado_oid);
			$filter->setMatriculado( $matriculado );
			$filter->saveProperties();
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addOrder('oid','DESC');
			$oCriteria->setPage(1);
			$oCriteria->setRowPerPage(1);
			$managerCuota =  ManagerFactory::getCuotaManager();
         	$oCuota = $managerCuota->getEntity($oCriteria);
            if (empty($oCuota)) {
            	throw new GenericException( CPIQ_MSG_CUOTA_INEXISTENTE );
            }
            $oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter("cuota_oid", $oCuota->getOid(), "=" );
			$oCriteria->addFilter("matriculado_oid", $matriculado_oid, "=" );
			$managerCuotaGenerada =  ManagerFactory::getCuotaGeneradaManager();
         	$oCuotaGenerada = $managerCuotaGenerada->getEntity($oCriteria);
            if (empty($oCuotaGenerada)) {
            	$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('matriculado_oid', $matriculado_oid, '=');
				$oCriteria->addNull('fechaHasta');
				$managerHistoricoEstado =  ManagerFactory::getHistoricoEstadoManager();
				$historicoEstado = $managerHistoricoEstado->getEntity($oCriteria);
				if ($historicoEstado->getEstadoMatriculado()) {
					if (($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_ACTIVO)||($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_NOVEL1)||($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_NOVEL2)) {
						$crearCuota=1;
						if (($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_NOVEL1)){
							$oCriteria = new CdtSearchCriteria();
							$oCriteria->addFilter('matriculado_oid', $matriculado_oid, '=');
							$managerTitulo =  ManagerFactory::getTituloManager();
							$titulo = $managerTitulo->getEntity($oCriteria);
							$years = CPIQUtils::edad(Date('Y-m-d'),CPIQUtils::formatDateToPersist($titulo->getFechaMatriculacion()));
							if ($years<1) {
								$crearCuota=0;
							}
							
						}
						if (($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_NOVEL2)){
							$oCriteria = new CdtSearchCriteria();
							$oCriteria->addFilter('matriculado_oid', $matriculado_oid, '=');
							$managerTitulo =  ManagerFactory::getTituloManager();
							$titulo = $managerTitulo->getEntity($oCriteria);
							$years = CPIQUtils::edad(Date('Y-m-d'),CPIQUtils::formatDateToPersist($titulo->getFechaMatriculacion()));
							if ($years<2) {
								$crearCuota=0;
							}
						}
						if ($crearCuota) {
							$oCuotaGenerada = new CuotaGenerada();
							$oCuotaGenerada->setCuota($oCuota);
							$oCuotaGenerada->setMatriculado($matriculado);
							
							/*$oMovCtaCteDeuda = new MovCtaCte();
							$oMovCtaCteDeuda->setFechaCarga(date(DB_DEFAULT_DATETIME_FORMAT));
							$oMovCtaCteDeuda->setMatriculado($matriculado);
							
							$oConcepto = new Concepto();
							$oConcepto->setOid(CPIQ_CONCEPTO_DEUDA_CUOTA_MATRICULA);
							$oMovCtaCteDeuda->setConcepto($oConcepto);
							$managerCuota =  ManagerFactory::getCuotaManager();
							$cuotaValores = $managerCuota->getValoresCuota($oCuotaGenerada->getCuota()->getOid());
							$importe=0;
							foreach ($cuotaValores as $oCuotaValor) {
								if ((date(DB_DEFAULT_DATE_FORMAT)>=$oCuotaValor->getFechaDesde())&&(date(DB_DEFAULT_DATE_FORMAT)<=$oCuotaValor->getFechaHasta())) {
									$oCriteria = new CdtSearchCriteria();
									$oCriteria->addFilter('matriculado_oid', $matriculado_oid, '=');
									$oCriteria->addFilter("tituloPrincipal", 1, "=" );
									$managerTitulo = new TituloManager();
									$oTitulo = $managerTitulo->getEntity($oCriteria);
									$importe = ($oTitulo->getTipoTitulo()->getIngenieroLicenciado()==1)?$oCuotaValor->getImporteIngeniero():$oCuotaValor->getImporte();
								}
							}
							$oMovCtaCteDeuda->setImporte($importe);
							$oUser = CdtSecureUtils::getUserLogged();
							$oMovCtaCteDeuda->setUser($oUser);
							$oMovCtaCteDeuda->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
							$managerMovCtaCte =  ManagerFactory::getMovCtaCteManager();
							$managerMovCtaCte->add($oMovCtaCteDeuda);
							$oCuotaGenerada->setMovCtaCteDeuda($oMovCtaCteDeuda);*/
							
							
							$oCuotaGenerada->setNombre(CPIQ_MSG_CUOTA_MATRICULA.' '.$oCuota->getYear());
							$oCuotaGenerada->setFechaCarga(date(DB_DEFAULT_DATE_FORMAT));
							$oUser = CdtSecureUtils::getUserLogged();
							$oCuotaGenerada->setUser($oUser);
							$oCuotaGenerada->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
							
							$managerCuotaGenerada->add($oCuotaGenerada);
						}
					}
				}
            	
            }
			/*if (!empty( $insert )) {
				$manager =  ManagerFactory::getEstadoMatriculadoManager();
				$estadoMatriculado = $manager->getObjectByCode(CPIQ_ESTADO_MATRICULADO_ACTIVO);
				$manager =  ManagerFactory::getHistoricoEstadoManager();
				$historicoEstado = new HistoricoEstado();
				$historicoEstado->setMatriculado($matriculado);
				$historicoEstado->setFechaDesde(date(DB_DEFAULT_DATETIME_FORMAT));
				$historicoEstado->setEstadoMatriculado($estadoMatriculado);
				$historicoEstado->setMotivo(CPIQ_CAMBIO_ESTADO_ACTIVO);
				$oUser = CdtSecureUtils::getUserLogged();
				$historicoEstado->setUser($oUser);
				$historicoEstado->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
				$manager->add($historicoEstado);
				
			}*/
		}
		$this->setFilter( $filter );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new CuotaGeneradaGridModel() );
		//$this->setRenderer( );
	}

}