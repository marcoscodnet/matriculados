<?php

/**
 * Factory para Registro Cuota
 *  
 * @author Marcos
 * @since 04-07-2013
 */
class RegistroCuotaFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('RegistroCuota');
        $titulo = parent::build($next);

        $factory = new RegistroFactory();
        $factory->setAlias( CPIQ_TABLE_REGISTRO . "_" );
        $titulo->setRegistro( $factory->build($next) );
        
   		if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$titulo->setUser( $factory->build($next) );
		}
        
        
        return $titulo;
    }
}
?>
