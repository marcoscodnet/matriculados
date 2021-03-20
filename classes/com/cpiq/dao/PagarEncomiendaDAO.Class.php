<?php

/**
 * DAO para pagar Encomienda
 *
 * @author Marcos
 * @since 17-10-2013
 */
class PagarEncomiendaDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_PAGAR_ENCOMIENDA;
	}

	public function getEntityFactory(){
		return new PagarEncomiendaFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		$fieldsValues["encomienda_oid"] = $this->formatIfNull( $entity->getEncomienda()->getOid(), 'null' );
		$fieldsValues["tipoPago_oid"] = $this->formatIfNull( $entity->getTipoPago()->getOid(), 'null' );
		$fieldsValues["movCtaCte_oid"] = $this->formatIfNull( $entity->getMovCtaCte()->getOid(), 'null' );
		$fieldsValues["movCtaCteDeuda_oid"] = $this->formatIfNull( $entity->getMovCtaCteDeuda()->getOid(), 'null' );
		
		$fieldsValues["entidad"] = $this->formatString( $entity->getEntidad() ); 
		$fieldsValues["nroCheque"] = $this->formatString( $entity->getNroCheque() );
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tPagarEncomienda = $this->getTableName();
		
		$tEncomienda = DAOFactory::getEncomiendaDAO()->getTableName();
		
		$tTipoPago = DAOFactory::getTipoPagoDAO()->getTableName();
		
		$tMovCtaCte = DAOFactory::getMovCtaCteDAO()->getTableName();
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tEncomienda . " ON($tPagarEncomienda.encomienda_oid = $tEncomienda.oid)";
        
        $sql .= " LEFT JOIN " . $tTipoPago . " ON($tPagarEncomienda.tipoPago_oid = $tTipoPago.oid)";
        
        $sql .= " LEFT JOIN " . $tMovCtaCte . " ON($tPagarEncomienda.movCtaCte_oid = $tMovCtaCte.oid)";
        $sql .= " LEFT JOIN " . $tMovCtaCte . " DEUDA ON($tPagarEncomienda.movCtaCteDeuda_oid = DEUDA.oid)";
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tPagarEncomienda.user_oid = $tUser.cd_user)";
       
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tRegistro = DAOFactory::getRegistroDAO()->getTableName();

		$tEncomienda = DAOFactory::getEncomiendaDAO()->getTableName();
        $fields[] = "$tEncomienda.oid as " . $tEncomienda . "_oid ";
        $fields[] = "$tEncomienda.numero as " . $tEncomienda . "_numero ";
          
        $tMovCtaCte = DAOFactory::getMovCtaCteDAO()->getTableName();
		$fields[] = "$tMovCtaCte.oid as " . $tMovCtaCte . "_oid ";
        $fields[] = "$tMovCtaCte.importe as " . $tMovCtaCte . "_importe ";
        
        
		$fields[] = "DEUDA.oid as DEUDA_oid ";
        $fields[] = "DEUDA.importe as DEUDA_importe ";
        
        $tTipoPago = DAOFactory::getTipoPagoDAO()->getTableName();
		$fields[] = "$tTipoPago.oid as " . $tTipoPago . "_oid ";
        $fields[] = "$tTipoPago.nombre as " . $tTipoPago . "_nombre ";
       
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}	
	
	

}
?>