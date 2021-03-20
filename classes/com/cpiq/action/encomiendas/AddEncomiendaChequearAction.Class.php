<?php

/**
 * Se chequea si un matriculado puede agregar un tipo de encomienda
 * 
 * @author Bernardo Iribarne (bernardo.iribarne@codnet.com.ar)
 * @since 09-10-2013
 *
 */
class AddEncomiendaChequearAction extends CdtAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtAction::execute();
	 */
	public function execute(){

		
		$result = "";
		
		try{
			if (CPIQUtils::isMatriculadoLogged()) {
	            //que se muestren sólo las encomiendas del matriculado
	            $oMatriculado = CPIQUtils::getMatriculadoLogged();
	            
	        }
			$tipoEncomienda_oid = CdtUtils::getParam("cd_tipo_encomienda");
			
			$valido = true; //TODO validar
			$mensajes = array();
			
			//validar matriculado activo.
			$matriculadoActivo = $this->esMatriculadoActivo( $oMatriculado );
			if(!$matriculadoActivo)
				$mensajes[] = CPIQ_MSG_MATRICULADO_NO_ACTIVO;

			//validar cuotas al día.
			$cuotaAlDia = $this->tieneCuotaAlDia( $oMatriculado );
			if(!$cuotaAlDia)
				$mensajes[] = CPIQ_MSG_MATRICULADO_SIN_CUOTA_AL_DIA;
				
			//validar sanciones de ética.
			$sancionesEtica = $this->tieneSancionesEtica( $oMatriculado );
			if($sancionesEtica)
				$mensajes[] = CPIQ_MSG_MATRICULADO_SANCIONES_ESTICAS;

			//validar incumbencias.
			$incumbencias = $this->tieneIncumbencias( $oMatriculado, $tipoEncomienda_oid );
			if(!$incumbencias)
				$mensajes[] = CPIQ_MSG_MATRICULADO_SIN_INCUMBENCIAS;
				
			$result['valido'] = $cuotaAlDia && $matriculadoActivo && !$sancionesEtica && $incumbencias;
			$result['mensajes'] = $mensajes;
			
		}catch(Exception $ex){
			
			$result['error'] = $ex->getMessage();
			
		}

		echo json_encode( $result ); 
		return null;
	}
	
	/**
	 * true si es un matriculado activo 
	 * @param Matriculado $matriculado
	 * @return boolean
	 */
	private function esMatriculadoActivo( Matriculado $oMatriculado ){

		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
		$oCriteria->addNull('fechaHasta');
		$managerHistoricoEstado =  ManagerFactory::getHistoricoEstadoManager();
		$historicoEstado = $managerHistoricoEstado->getEntity($oCriteria);
		if (empty($historicoEstado)) {
         	return false;
        }
		if (($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_ACTIVO)||($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_VITALICIO)||($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_NOVEL1)||($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_NOVEL2))
			return true;
		else return false;
	}
	
	/**
	 * true si el matriculado tiene la cuota al día
	 * @param Matriculado $oMatriculado
	 * @return boolean
	 */
	private function tieneCuotaAlDia( Matriculado $oMatriculado ){
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
		$oCriteria->addNull('fechaHasta');
		$managerHistoricoEstado =  ManagerFactory::getHistoricoEstadoManager();
		$historicoEstado = $managerHistoricoEstado->getEntity($oCriteria);
		if (($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_VITALICIO)){
			return true;
		}
		if (($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_NOVEL1)){
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
			$managerTitulo =  ManagerFactory::getTituloManager();
			$titulo = $managerTitulo->getEntity($oCriteria);
			$years = CPIQUtils::edad(Date('Y-m-d'),CPIQUtils::formatDateToPersist($titulo->getFechaMatriculacion()));
			if ($years<1) {
				return true;
			}
		}
		if (($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_NOVEL2)){
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
			$managerTitulo =  ManagerFactory::getTituloManager();
			$titulo = $managerTitulo->getEntity($oCriteria);
			$years = CPIQUtils::edad(Date('Y-m-d'),CPIQUtils::formatDateToPersist($titulo->getFechaMatriculacion()));
			if ($years<2) {
				return true;
			}
		}
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addOrder('oid','DESC');
		$oCriteria->setPage(1);
		$oCriteria->setRowPerPage(1);
		$managerCuota =  ManagerFactory::getCuotaManager();
        $oCuota = $managerCuota->getEntity($oCriteria);
        if (empty($oCuota)) {
         	return false;
        }		
        $oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
		$oCriteria->addFilter('cuota_oid', $oCuota->getOid(), '=');
		$managerCuotaGenerada =  ManagerFactory::getCuotaGeneradaManager();
		$cuotasGenerada = $managerCuotaGenerada->getEntities($oCriteria);
		if ($cuotasGenerada->isEmpty()) {
			return false;
		}
		else{
			foreach ($cuotasGenerada as $oCuotaGenerada) {
				$retorno = false;
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('oid', $oCuotaGenerada->getMovCtaCte()->getOid(), '=');
				$oCriteria->addNull('anulacion_oid');
				$managerMovCtaCte =  ManagerFactory::getMovCtaCteManager();
				$oMovCtaCte = $managerMovCtaCte->getEntity($oCriteria);
				if (!empty($oCuota)) {
         				$retorno = true;
        		}			
			}
		}
		return $retorno;
			
	}
	
	/**
	 * true si el matriculado tiene sanciones de ética
	 * @param Matriculado $oMatriculado
	 * @return boolean
	 */
	private function tieneSancionesEtica( Matriculado $oMatriculado ){
		
		return false;
	}
	
	/**
	 * true si el matriculado posee incumbencias para el tipo de encomienda
	 * @param Matriculado $oMatriculado
	 * @param unknown_type $tipoEncomienda_oid
	 * @return boolean
	 */
	private function tieneIncumbencias( Matriculado $oMatriculado, $tipoEncomienda_oid ){
		$oCriteriaIncumbenciaTipoEncomienda = new CdtSearchCriteria();
		$oCriteriaIncumbenciaTipoEncomienda->addFilter('tipoEncomienda_oid', $tipoEncomienda_oid, '=');
		
		$managerIncumbenciaTipoEncomienda =  ManagerFactory::getIncumbenciaTipoEncomiendaManager();
		$incumbenciasTipoEncomienda = $managerIncumbenciaTipoEncomienda->getEntities($oCriteriaIncumbenciaTipoEncomienda);
		if ($incumbenciasTipoEncomienda->isEmpty()) {
			return true;
		}
		else{
			foreach ($incumbenciasTipoEncomienda as $oIncumbenciaTipoEncomienda) {
				$oCriteriaIncumbenciaTipoTitulo = new CdtSearchCriteria();
				$oCriteriaIncumbenciaTipoTitulo->addFilter('incumbencia_oid', $oIncumbenciaTipoEncomienda->getIncumbencia()->getOid(), '=');
				
				$managerIncumbenciaTipoTitulo =  ManagerFactory::getIncumbenciaTipoTituloManager();
				$incumbenciasTipoTitulo = $managerIncumbenciaTipoTitulo->getEntities($oCriteriaIncumbenciaTipoTitulo);
				if ($incumbenciasTipoTitulo->isEmpty()) {
					//return true;
				}
				else{
					foreach ($incumbenciasTipoTitulo as $oIncumbenciaTipoTitulo) {
						/*$oCriteriaTipoTitulo = new CdtSearchCriteria();
						$oCriteriaTipoTitulo->addFilter('tipoTitulo_oid', $oIncumbenciaTipoTitulo->getTipoTitulo()->getOid(), '=');
						
						$managerTipoTitulo =  ManagerFactory::getTipoTituloManager();
						$oTipoTitulo = $managerTipoTitulo->getEntity($oCriteriaTipoTitulo);*/
						$oCriteriaTitulo = new CdtSearchCriteria();
						$oCriteriaTitulo->addFilter('tipoTitulo_oid', $oIncumbenciaTipoTitulo->getTipoTitulo()->getOid(), '=');
						$oCriteriaTitulo->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
						$managerTitulo =  ManagerFactory::getTituloManager();
						$oTitulo = $managerTitulo->getEntity($oCriteriaTitulo);
						if (empty($oTitulo)) {
				         	return false;
				        }	
						
					}
					//return true;
				}
				$managerIncumbenciaRegistro =  ManagerFactory::getIncumbenciaRegistroManager();
				$incumbenciasRegistro = $managerIncumbenciaRegistro->getEntities($oCriteriaIncumbenciaRegistro);
				if ($incumbenciasRegistro->isEmpty()) {
					return true;
				}
				else{
					foreach ($incumbenciasRegistro as $oIncumbenciaRegistro) {
						
						$oCriteriaCuotaRegistro = new CdtSearchCriteria();
						$oCriteriaCuotaRegistro->addFilter('registro_oid', $oIncumbenciaTipoTitulo->getRegistro()->getOid(), '=');
						$managerCuotaRegistro =  ManagerFactory::getCuotaRegistroManager();
						$cuotasRegistro = $managerCuotaTipoTitulo->getEntities($oCriteriaCuotaRegistro);
						if ($cuotasRegistro->isEmpty()) {
							return true;
						}
						else{
							foreach ($cuotasRegistro as $oCuotaRegistro) {
								$oCriteriaCuotaRegistro = new CdtSearchCriteria();
								$oCriteriaMatriculadoRegistro->addFilter('cuotaRegistro_oid', $oCuotaRegistro->getOid(), '=');
								$oCriteriaMatriculadoRegistro->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
								$oCriteriaMatriculadoRegistro->addNotNull('movCtaCte_oid');
								$managerMatriculadoRegistro =  ManagerFactory::getMatriculadoRegistroManager();
								$oMatriculadoRegistro = $managerMatriculadoRegistro->getEntity($oCriteriaMatriculadoRegistro);
								if ($oMatriculadoRegistro) {
						         	return true;
						        }	
							}
							return false;
						}
					
					}
					return true;
				}
			}
		}
		
	}
	
}