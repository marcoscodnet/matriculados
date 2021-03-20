<?php

/**
 * Factory para Historico Estado
 *  
 * @author Marcos
 * @since 14-06-2013
 */
class HistoricoEstadoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('HistoricoEstado');
        $historicoEstado = parent::build($next);

        
        
        $factory = new MatriculadoFactory();
        $factory->setAlias( CPIQ_TABLE_MATRICULADO . "_" );
        $historicoEstado->setMatriculado( $factory->build($next) );
        
    	$factory = new EstadoMatriculadoFactory();
        $factory->setAlias( CPIQ_TABLE_ESTADO_MATRICULADO . "_" );
        $historicoEstado->setEstadoMatriculado( $factory->build($next) );
        
    	if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$historicoEstado->setUser( $factory->build($next) );
		}
        
        
        return $historicoEstado;
    }
}
?>
