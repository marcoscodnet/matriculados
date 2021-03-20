<?php
class CMPRegistroCuotaAutocomplete extends CMPEntityAutocomplete{

	protected function getEntityClazz(){
		return "RegistroCuota";
	}

	protected function getFieldCode(){
		return "oid";
	}

	protected function getFieldSearch(){
		return "year";
	}
	
	
	protected function getEntityManager(){
		return ManagerFactory::getRegistroCuotaManager();
	}


	public function __construct(){
		$properties = array();
		$properties[] = "oid";
		$properties[] = "year";
		$properties[] = "importe";
		$this->setPropertiesList($properties);
	}
	
	

	

	protected function getItemDropDown( $entity ){
		$dropdownItem = "<div id='autocomplete_item_desc'><table><tr>";
		$dropdownItem .= "<td>".  $entity->getYear() . "</td>";
		$dropdownItem .= "<td>".  $entity->getImporte() . "</td>";
		$dropdownItem .= "</tr></table></div>";
		return $dropdownItem;
	}

}
?>