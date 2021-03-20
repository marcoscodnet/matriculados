<?php

/**
 * Helper DAO para administrar en sesión los profesionales de una 
 * encomienda.
 *  
 * @author Bernardo
 * @since 08-10-2013
 */
class EncomiendaProfesionalSessionDAO extends EntityDAO {

	public function getFieldsToAdd($entity){}
	
	public function getFieldsToUpdate($entity){}
	
	public function getId($entity){}
		
	public function getIdFieldName(){}
	
	public function setId($entity, $id){}
	
	public function getTableName(){}
	
	public function getEntityFactory(){}
	
	public function getVariableSessionName(){
		return "encomienda_profesionales";
	}
	
    /**
     * se persiste la nueva entity
     * @param $entity entity a persistir.
     */
    public function addEntity( $entity, $idConn=0 ) {
    	
    	$profesionales = unserialize( $_SESSION[ $this->getVariableSessionName() ] );
    	
    	if( empty($profesionales) )
    		$profesionales = new ItemCollection();
    		
        $profesionales->addItem($entity);
        
        $_SESSION[$this->getVariableSessionName()] = serialize($profesionales);
        
    }
    
    /**
     */
    public function setEntities( $entities, $idConn=0 ) {
    	
        $_SESSION[$this->getVariableSessionName()] = serialize($entities);
        
    }
    
    /**
     * se modifica la entity
     * @param $entity entity a modificar.
     */
    public function updateEntity($entity, $idConn=0) {
        //TODO
    }

    /**
     * se elimina la entity
     * @param $id identificador de la entity a eliminar.
     */
    public function deleteEntity($oid, $idConn=0) {
    	
    	$oid = urldecode($oid);
    	
    	$profesionales = unserialize( $_SESSION[$this->getVariableSessionName()] );
    	
    	//el oid representaría el profesional??
    	$nuevosProfesionales = new ItemCollection();
    	foreach ($profesionales as $profesional) {
    		
    		if( $profesional->getProfesional() != $oid ){
    			$nuevosProfesionales->addItem($profesional);
    		}
    	}
    	
        $_SESSION[$this->getVariableSessionName()] = serialize($nuevosProfesionales);
    	
    }

    /**
     * quitamos todos los profesionales de sesión
     */
    public function deleteAll() {
    	unset( $_SESSION[$this->getVariableSessionName()] ) ;
    	
    }
    /**
     * se obtiene una colección de entities dado el filtro de búsqueda
     * @param CdtSearchCriteria $oCriteria filtro de búsqueda.
     * @return ItemCollection
     */
    public function getEntities(CdtSearchCriteria $oCriteria, $idConn=0) {

    	if(isset($_SESSION[$this->getVariableSessionName()]))
			$profesionales = unserialize( $_SESSION[$this->getVariableSessionName()] );
		else 
			$profesionales = new ItemCollection();	

		return $profesionales;
    }

    /**
     * se obtiene la cantidad de entities dado el filtro de búsqueda
     * @param CdtSearchCriteria $oCriteria filtro de búsqueda.
     * @return int
     */
    public function getEntitiesCount(CdtSearchCriteria $oCriteria, $idConn=0) {
        
    	$profesionales = unserialize($this->getVariableSessionName() );

        return $profesionales->size();
    }

    /**
     * se obtiene un entity dado el filtro de búsqueda
     * @param CdtSearchCriteria $oCriteria filtro de búsqueda.
     * @return Entity
     */
    public function getEntity(CdtSearchCriteria $oCriteria, $idConn=0) {
		//TODO
    }
	
	public function getEntityById($id) {
		//TODO
    }
		
}
?>