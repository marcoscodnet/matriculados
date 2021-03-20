<?php

/**
 * Factory para Incumbencia Registro
 *  
 * @author Marcos
 * @since 26-09-2013
 */
class IncumbenciaRegistroFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('IncumbenciaRegistro');
        $incumbencia = parent::build($next);

        $factory = new IncumbenciaFactory();
        $factory->setAlias( CPIQ_TABLE_INCUMBENCIA . "_" );
        $incumbencia->setIncumbencia( $factory->build($next) );
        
        $factory = new RegistroFactory();
        $factory->setAlias( CPIQ_TABLE_REGISTRO . "_" );
        $incumbencia->setRegistro( $factory->build($next) );
        
   		if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$incumbencia->setUser( $factory->build($next) );
		}
        
        
        return $incumbencia;
    }
}
?>
