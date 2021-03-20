<?php

/**
 * Factory para TipoTitulo
 *
 * @author Bernardo
 * @since 17-05-2013
 */
class TipoTituloFactory extends CdtGenericFactory {

	public function build($next) {

		$this->setClassName('TipoTitulo');
		$tipoTitulo = parent::build($next);

		$factory = new ClaseTituloFactory();
        $factory->setAlias( CPIQ_TABLE_CLASE_TITULO . "_" );
        $tipoTitulo->setClaseTitulo( $factory->build($next) );
        
        $factory = new SecuenciaTituloFactory();
        $factory->setAlias( CPIQ_TABLE_SECUENCIA_TITULO . "_" );
        $tipoTitulo->setSecuenciaTitulo( $factory->build($next) );
		
		return $tipoTitulo;
	}

}
?>
