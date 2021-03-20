<?php

/**
 * Implementación para renderizar el formulario de cuota 
 *
 * @author Bernardo Iribarne (bernardo.iribarne@codnet.com.ar)
 * @since 27-06-2013
 *
 */
class CMPCuotaFormRenderer extends DefaultFormRenderer {

	private $helper;
	
	public function __construct(CMPCuotaFormHelper $helper){
	
		$this->helper = $helper;
	}
	
	protected function renderCustom(CMPForm $form, XTemplate $xtpl){
		
		$custom = $this->helper->show();
		
		$xtpl->assign('intoFormCustomHTML', $custom );

	}
	
	
			
}