<?php

/**
 * Se chequea si un matriculado está cargado
 * 
 * @author Marcos
 * @since 28-10-2013
 *
 */
class AddRegistroChequearAction extends CdtAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtAction::execute();
	 */
	public function execute(){

		
		$result = "";
		
		try{
			
			$documento = CdtUtils::getParam("documento");
			
			$valido = true; //TODO validar
			
			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('nroDocumento', $documento, '=');
			
			$managerMatriculado =  ManagerFactory::getMatriculadoManager();
			$oMatriculado = $managerMatriculado->getEntity($oCriteria);
			if (empty($oMatriculado)) {
				$valido=false;
				$mensajes=CPIQ_SECURE_MSG_REGISTRATION_MATRICULADO_CONTROL_ERROR;
			}
			else $mensajes=CPIQ_SECURE_MSG_REGISTRATION_MATRICULADO_CONTROL_1.' '.$oMatriculado->getApellido().', '.$oMatriculado->getNombre().' '.CPIQ_SECURE_MSG_REGISTRATION_MATRICULADO_CONTROL_2;
			
			
				
			$result['valido'] = $valido;
			$result['mensajes'] = $mensajes;
			
		}catch(Exception $ex){
			
			$result['error'] = $ex->getMessage();
			
		}

		echo json_encode( $result ); 
		return null;
	}
	
	
	
}