<?php 

/**
 * Acci�n para desloguearse de CPIQ.
 * 
 * @author Marcos
 * @since 08-10-2013
 * 
 */
class CPIQExitAction extends CdtExitAction{

	/**
	 * redefinimos para quitar de sesi�n
	 * el miembro asociado al usuario.
	 */
	public function execute(){
		
		CPIQUtils::logout();
		
		return parent::execute();

		
	}
	
}