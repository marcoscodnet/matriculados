<?php

/**
 * Implementación para renderizar el formulario de cuota 
 *
 * @author Bernardo Iribarne (bernardo.iribarne@codnet.com.ar)
 * @since 27-06-2013
 *
 */
class CMPCuotaValorFormRenderer extends DefaultFormRenderer {

	
	public function render(CMPForm $oForm) {

        $xtpl = $this->getXTemplate();

        $this->renderFieldset( $oForm, $xtpl );
        
        $this->renderHiddens( $oForm, $xtpl );
        
        $xtpl->parse('main');
        $content = $xtpl->text('main');
        return $content;
    }
		
    protected function getXTemplate() {
    	
    	return new XTemplate( CPIQ_TEMPLATE_CUOTA_VALOR_FORM );
    }
    
}