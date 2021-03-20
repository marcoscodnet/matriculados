<?php

/**
 * Se chequea el tipo de comitente
 * 
 * @author Marcos
 * @since 18-10-2013
 *
 */
class AddEncomiendaChequearTipoComitenteAction extends CdtAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtAction::execute();
	 */
	public function execute(){

		
		$result = "";
		
		try{
			
			$tipoComitente_oid = CdtUtils::getParam("tipoComitente_oid");
			
			//$valido = true; //TODO validar
			$show = array();
			$hide = array();
			
			
	    	if ($tipoComitente_oid==CPIQ_PERSONA_FISICA) {
	    		$show[]='tipoDocumento_oid';
	    		$show[]='documento';
	    		$hide[]='representante';
	    	}
	    	if ($tipoComitente_oid==CPIQ_PERSONA_JURIDICA) {
	    		$hide[]='tipoDocumento_oid';
	    		$hide[]='documento';
	    		$show[]='representante';
	    	}
			
			
			
			
			
			$result['hide'] = $hide;
			$result['show'] = $show;
			
		}catch(Exception $ex){
			
			$result['error'] = $ex->getMessage();
			
		}

		echo json_encode( $result ); 
		return null;
	}
	
	
	
}