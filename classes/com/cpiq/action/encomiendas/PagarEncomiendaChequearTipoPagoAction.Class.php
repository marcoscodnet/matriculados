<?php

/**
 * Se chequea el tipo de pago
 * 
 * @author Marcos
 * @since 19-10-2013
 *
 */
class PagarEncomiendaChequearTipoPagoAction extends CdtAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtAction::execute();
	 */
	public function execute(){

		
		$result = "";
		
		try{
			
			$tipoPago_oid = CdtUtils::getParam("tipoPago_oid");
			
			$managerTipoPago = new TipoPagoManager();
			$oTipoPago = $managerTipoPago->getObjectByCode($tipoPago_oid);
	
			//$valido = true; //TODO validar
			$show = array();
			$hide = array();
	    	if ($oTipoPago->getEntidad()) {
	    		$show[]='entidad';
	    	}
	    	else 
	    		$hide[]='entidad';
			
			if ($oTipoPago->getCheque()) {
	    		$show[]='nroCheque';
	    	}
	    	else 
	    		$hide[]='nroCheque';
			
			
			
			
			$result['hide'] = $hide;
			$result['show'] = $show;
			
		}catch(Exception $ex){
			
			$result['error'] = $ex->getMessage();
			
		}

		echo json_encode( $result ); 
		return null;
	}
	
	
	
}