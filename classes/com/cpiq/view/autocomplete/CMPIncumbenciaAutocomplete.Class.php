<?php
class CMPIncumbenciaAutocomplete extends CMPEntityAutocomplete{

	protected function getEntityClazz(){
		return "Incumbencia";
	}

	protected function getFieldCode(){
		return "oid";
	}

	protected function getFieldSearch(){
		return "nombre";
	}
	
	
	protected function getEntityManager(){
		return ManagerFactory::getIncumbenciaManager();
	}


	public function __construct(){
		$properties = array();
		$properties[] = "oid";
		$properties[] = "nombre";
	
		$this->setPropertiesList($properties);
	}
	
	protected function getCriteria($text, $parent=null){
		
		$criterio = new CdtSearchCriteria();

		$tIncumbencia = DAOFactory::getIncumbenciaDAO()->getTableName();
		
		
		$filter = new CdtSimpleExpression( "($tIncumbencia.nombre like '$text%')");

		$criterio->setExpresion($filter);

		return $criterio;
	}

	

	protected function getItemDropDown( $entity ){
		$dropdownItem = "<div id='autocomplete_item_desc'><table><tr>";
		$dropdownItem .= "<td>".  $entity->getNombre() . "</td>";
		
		$dropdownItem .= "</tr></table></div>";
		return $dropdownItem;
	}

}
?>