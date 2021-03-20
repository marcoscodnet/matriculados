<?php

/**
 * Factory para Registro Matriculado
 *  
 * @author Marcos
 * @since 20-03-2017
 */
class RegistroCuotaMatriculadoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('RegistroCuotaMatriculado');
        $registroCuotaMatriculado = parent::build($next);

        $factory = new MatriculadoFactory();
        $factory->setAlias( CPIQ_TABLE_MATRICULADO . "_" );
        $registroCuotaMatriculado->setMatriculado( $factory->build($next) );
        
   		$factory = new RegistroCuotaFactory();
        $factory->setAlias( CPIQ_TABLE_REGISTRO_CUOTA . "_" );
        $registroCuotaMatriculado->setRegistroCuota( $factory->build($next) );
        
        $factory = new RegistroFactory();
        $factory->setAlias( CPIQ_TABLE_REGISTRO . "_" );
        $registroCuotaMatriculado->setRegistro( $factory->build($next) );
        
        $factory = new TituloFactory();
        $factory->setAlias( CPIQ_TABLE_TITULO . "_" );
        $registroCuotaMatriculado->setTitulo( $factory->build($next) );
        
    	$factory = new MovCtaCteFactory();
        $factory->setAlias( CPIQ_TABLE_MOV_CTACTE . "_" );
        $registroCuotaMatriculado->setMovCtaCte( $factory->build($next) );
        
        $factory = new MovCtaCteFactory();
        $factory->setAlias( "DEUDA_" );
        $registroCuotaMatriculado->setMovCtaCteDeuda( $factory->build($next) );
        
   		if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$registroCuotaMatriculado->setUser( $factory->build($next) );
		}
        
        return $registroCuotaMatriculado;
    }
}
?>
