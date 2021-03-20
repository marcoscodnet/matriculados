<?php 

/**
 * 
 * 
 * @author Marcos
 * @since 24-10-2010
 * 
 */
class CuotaGeneradaErrorAction extends CdtOutputAction{

	//instancia de la entidad a editar.
	protected $oEntity;
	
	/**
	 * layout a utilizar para la salida.
	 * @return Layout
	 */
	protected function getLayout(){
		//el layuout serï¿½ definido en la constante DEFAULT_LAYOUT
		
		//instanciamos el layout por reflection.
		$oLayout = CdtReflectionUtils::newInstance(DEFAULT_EDIT_LAYOUT);
		
		return $oLayout;
	}
	

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputContent();
	 */
	protected function getOutputContent(){
				
		
			
			
		
		
		try{
			
			throw new GenericException( CPIQ_MSG_CUOTA_GENERADA_PAGAR_PROHIBIDO );
			
				
		}catch(GenericException $ex){
			
			//tratamos la excepciï¿½n.
			$content = $this->doValidateException( $ex );
			
		}
		
		return $content;
	}
	
	
		
/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_CUOTA_GENERADA_PAGAR_PROHIBIDO;
	}
	

	/**
	 * se parsean los errores.
	 * @param XTemplate $xtpl
	 */
	protected function parseErrors( XTemplate $xtpl ){
		
		//chequemos si existen errores asociados al request.
		if( CdtUtils::hasRequestError() && $xtpl->existsBlock( "main.msg" ) ){
		
			//los parseamos en el template.
			$error = CdtUtils::getRequestError();
			
			$msg  = $error['msg'];
			$code = $error['code'];
			
			$xtpl->assign ( 'msg', urldecode( $msg ) );
			$xtpl->assign ( 'code', $code );
			$xtpl->assign ( 'classMsg', 'msjerror' );
			$xtpl->parse ( 'main.msg' );

			
			
			CdtUtils::cleanRequestError();
		}
		
		
	}
	
	/**
	 * dejamos esta puerta para que se realicen ciertas validaciones
	 * antes de mostrar la pï¿½gina.
	 */
	protected function doValidate(){
		//
	}

	/**
	 * En caso de que la validaciï¿½n lance alguna excepciï¿½n
	 * se ejecuta este mï¿½todo.
	 * @param GenericException $ex excepciï¿½n lanzada por la validaciï¿½n.
	 * @return output string
	 */
	protected function doValidateException( GenericException $ex ){	
		
		//asociamos el error al request.
		CdtUtils::setRequestError( $ex );
		
		return $this->getExceptionOutputContentImpl($ex);
		
	}
	
	/**
	 * este es el contenido que se muestra cuando se lanza una exepciï¿½n
	 * por validaciï¿½n (siempre previa a la ediciï¿½n, serï¿½a en el init.
	 */
	protected function getExceptionOutputContentImpl(GenericException $ex){
		
		$xtpl =  new XTemplate(CPIQ_TEMPLATE_CUOTA_GENERADA_ERROR);
		$xtpl->assign('lbl_back', CPIQ_MSG_CERRAR);
	
		$this->parseErrors( $xtpl );
        
		$xtpl->parse ( 'main' );
		return $xtpl->text ( 'main' );	
	}
	

	
}