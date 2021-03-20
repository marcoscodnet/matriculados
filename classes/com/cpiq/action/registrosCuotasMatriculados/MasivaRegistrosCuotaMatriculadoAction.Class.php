<?php

/**
 * Acción para generar cuotas masivas de registros
 *
 * @author Marcos
 * @since 20-03-2017
 *
 */
class MasivaRegistrosCuotaMatriculadoAction extends CdtAction{


     public function execute(){
          

         $layout =  new CdtLayoutXls();
         $nombre = CPIQ_LBL_CUOTA_GENERADA_MASIVA_FILE.'_'.date(CPIQ_DATETIME_FORMAT_STRING);
         $layout->setFilename($nombre);

        
			$html .= "<table border=1'><tr><th>".CPIQ_LBL_ENTITY_OID."</th><th>".CPIQ_LBL_MATRICULADO_APELLIDO."</th><th>".CPIQ_LBL_MATRICULADO_NOMBRE."</th><th>".CPIQ_LBL_MATRICULADO_TIPO_DOCUMENTO."</th><th>".CPIQ_LBL_MATRICULADO_NRO_DOCUMENTO."</th></tr>";
         			
			$managerMatriculado =  ManagerFactory::getMatriculadoManager();
			$matriculados = $managerMatriculado->getEntities(new CdtSearchCriteria());
			$cant=0;
			foreach ($matriculados as $oMatriculado) {
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
				
				$managerRegistroMatriculado =  ManagerFactory::getRegistroMatriculadoManager();
				$registrosMatriculado = $managerRegistroMatriculado->getEntities($oCriteria);
				foreach ($registrosMatriculado as $registroMatriculado) {
					
					$oCriteria = new CdtSearchCriteria();
					$oCriteria->addFilter('registro_oid', $registroMatriculado->getRegistro()->getOid(), '=');
					$oCriteria->addFilter("year", date('Y'), "=" );
					$managerRegistroCuota =  ManagerFactory::getRegistroCuotaManager();
					$registroCuota = $managerRegistroCuota->getEntity($oCriteria);
					if (!empty($registroCuota)) {
						$oCriteria = new CdtSearchCriteria();
						$oCriteria->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
						$oCriteria->addFilter('registroCuota_oid', $registroCuota->getOid(), '=');
						$tTitulo = DAOFactory::getTituloDAO()->getTableName();
						$filter = new CdtSimpleExpression("(".$tTitulo.".tituloPrincipal = 1 OR ".$tTitulo.".oid is null)");
						$oCriteria->setExpresion($filter);
						$managerRegistroCuotaMatriculado =  ManagerFactory::getRegistroCuotaMatriculadoManager();
						$cuotasGenerada = $managerRegistroCuotaMatriculado->getEntities($oCriteria);
						if ($cuotasGenerada->isEmpty()) {
							$oCriteria = new CdtSearchCriteria();
							$oCriteria->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
							$oCriteria->addNull('fechaHasta');
							$managerHistoricoEstado =  ManagerFactory::getHistoricoEstadoManager();
							$historicoEstado = $managerHistoricoEstado->getEntity($oCriteria);
							if ($historicoEstado) {
								if (($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_ACTIVO)||($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_NOVEL1)||($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_NOVEL2)||($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_VITALICIO)) {
									
									CdtDbManager::begin_tran();
					 				try{
										$oRegistroCuotaMatriculado = new RegistroCuotaMatriculado();
										$oRegistroCuotaMatriculado->setFecha(date(DB_DEFAULT_DATE_FORMAT));
										$oRegistroCuotaMatriculado->setMatriculado($oMatriculado);
										$oRegistroCuotaMatriculado->setRegistroCuota($registroCuota);
							
										$oUser = CdtSecureUtils::getUserLogged();
										$oRegistroCuotaMatriculado->setUser($oUser);
										$oRegistroCuotaMatriculado->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
										
										$managerRegistroCuotaMatriculado->add($oRegistroCuotaMatriculado);
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
							else CdtUtils::log('Problema con el historico estado - Matriculado: '.$oMatriculado->getOid(), __CLASS__,LoggerLevel::getLevelDebug());
							
						}
					}
					
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
