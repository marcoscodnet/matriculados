<?php

/**
 * Acción para generar cutas masivas
 *
 * @author Marcos
 * @since 02-07-2013
 *
 */
class MasivaCuotasGeneradaAction extends CdtAction{


     public function execute(){
          

         $layout =  new CdtLayoutXls();
         $nombre = CPIQ_LBL_CUOTA_GENERADA_MASIVA_FILE.'_'.date(CPIQ_DATETIME_FORMAT_STRING);
         $layout->setFilename($nombre);

        
			$html .= "<table border=1'><tr><th>".CPIQ_LBL_ENTITY_OID."</th><th>".CPIQ_LBL_MATRICULADO_APELLIDO."</th><th>".CPIQ_LBL_MATRICULADO_NOMBRE."</th><th>".CPIQ_LBL_MATRICULADO_TIPO_DOCUMENTO."</th><th>".CPIQ_LBL_MATRICULADO_NRO_DOCUMENTO."</th></tr>";
         	$oCriteria = new CdtSearchCriteria();
			$oCriteria->addOrder('oid','DESC');
			$oCriteria->setPage(1);
			$oCriteria->setRowPerPage(1);
			$managerCuota =  ManagerFactory::getCuotaManager();
         	$oCuota = $managerCuota->getEntity($oCriteria);
            if (empty($oCuota)) {
            	throw new GenericException( CPIQ_MSG_CUOTA_INEXISTENTE );
            }			
			$managerMatriculado =  ManagerFactory::getMatriculadoManager();
			$matriculados = $managerMatriculado->getEntities(new CdtSearchCriteria());
			$cant=0;
			foreach ($matriculados as $oMatriculado) {
				
				$managerCuotaGenerada =  ManagerFactory::getCuotaGeneradaManager();
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
				$oCriteria->addFilter('cuota_oid', $oCuota->getOid(), '=');
				$cuotasGenerada = $managerCuotaGenerada->getEntities($oCriteria);
				if ($cuotasGenerada->isEmpty()) {
					$oCriteria = new CdtSearchCriteria();
					$oCriteria->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
					$oCriteria->addNull('fechaHasta');
					$managerHistoricoEstado =  ManagerFactory::getHistoricoEstadoManager();
					$historicoEstado = $managerHistoricoEstado->getEntity($oCriteria);
					if ($historicoEstado) {
						if (($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_ACTIVO)||($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_NOVEL1)||($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_NOVEL2)) {
							$crearCuota=1;
							if (($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_NOVEL1)){
								$oCriteria = new CdtSearchCriteria();
								$oCriteria->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
								$managerTitulo =  ManagerFactory::getTituloManager();
								$titulo = $managerTitulo->getEntity($oCriteria);
								$years = CPIQUtils::edad(Date('Y-m-d'),CPIQUtils::formatDateToPersist($titulo->getFechaMatriculacion()));
								if ($years<1) {
									$crearCuota=0;
								}
								
							}
							if (($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_NOVEL2)){
								$oCriteria = new CdtSearchCriteria();
								$oCriteria->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
								$managerTitulo =  ManagerFactory::getTituloManager();
								$titulo = $managerTitulo->getEntity($oCriteria);
								$years = CPIQUtils::edad(Date('Y-m-d'),CPIQUtils::formatDateToPersist($titulo->getFechaMatriculacion()));
								if ($years<2) {
									$crearCuota=0;
								}
							}
							if ($crearCuota) {
								CdtDbManager::begin_tran();
				 				try{
									$oCuotaGenerada = new CuotaGenerada();
									$oCuotaGenerada->setCuota($oCuota);
									$oCuotaGenerada->setMatriculado($oMatriculado);
									
									/*$oMovCtaCteDeuda = new MovCtaCte();
									$oMovCtaCteDeuda->setFechaCarga(date(DB_DEFAULT_DATETIME_FORMAT));
									$oMovCtaCteDeuda->setMatriculado($oMatriculado);
									
									$oConcepto = new Concepto();
									$oConcepto->setOid(CPIQ_CONCEPTO_DEUDA_CUOTA_MATRICULA);
									$oMovCtaCteDeuda->setConcepto($oConcepto);
									$managerCuota =  ManagerFactory::getCuotaManager();
									$cuotaValores = $managerCuota->getValoresCuota($oCuotaGenerada->getCuota()->getOid());
									$importe=0;
									foreach ($cuotaValores as $oCuotaValor) {
										if ((date(DB_DEFAULT_DATE_FORMAT)>=$oCuotaValor->getFechaDesde())&&(date(DB_DEFAULT_DATE_FORMAT)<=$oCuotaValor->getFechaHasta())) {
											$importe = $oCuotaValor->getImporte();
										}
									}
									$oMovCtaCteDeuda->setImporte($importe);
									$oUser = CdtSecureUtils::getUserLogged();
									$oMovCtaCteDeuda->setUser($oUser);
									$oMovCtaCteDeuda->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
									$managerMovCtaCte =  ManagerFactory::getMovCtaCteManager();
									$managerMovCtaCte->add($oMovCtaCteDeuda);
									$oCuotaGenerada->setMovCtaCteDeuda($oMovCtaCteDeuda);*/
									
									$oCuotaGenerada->setNombre($oCuota->getNombre().' '.CPIQ_MSG_CUOTA_GENERADA_PROCESO_MASIVO);
									$oCuotaGenerada->setFechaCarga(date(DB_DEFAULT_DATE_FORMAT));
									$oUser = CdtSecureUtils::getUserLogged();
									$oCuotaGenerada->setUser($oUser);
									$oCuotaGenerada->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
									
									$managerCuotaGenerada->add($oCuotaGenerada);
									$html .= "<tr><td>".$oMatriculado->getOid()."</td><td>".$oMatriculado->getApellido()."</td><td>".$oMatriculado->getNombre()."</td><td>".$oMatriculado->getTipoDocumento()->getNombre()."</td><td>".$oMatriculado->getNroDocumento()."</td></tr>";
									$cant++;
				 					CdtDbManager::save();
								}catch(GenericException $ex){
						             //capturamos la excepción y la parseamos en el layout.
						             //$layout->setException( $ex );
						             CdtDbManager::undo();
						         }
							}
						}
					}
					else CdtUtils::log('Problema con el historico estado - Matriculado: '.$oMatriculado->getOid(), __CLASS__,LoggerLevel::getLevelDebug());
					
				}
				
			}
            $html .= "<tr><td colspan='5'></td></tr><tr><td colspan='5'>".CPIQ_LBL_CUOTA_GENERADA_PROCESADOS.": ".$cant."</td></tr></table>"; 
             

             //armamos el layout.

             $layout->setContent(CdtUIUtils::encodeCharactersXls($html));
             $layout->setTitle(CPIQ_LBL_CUOTA_GENERADA_MASIVA);

             

         

         //mostramos la salida formada por el layout.
         echo $layout->show();

         //no hay forward.
         $forward = null;

         return $forward;
     }

}
