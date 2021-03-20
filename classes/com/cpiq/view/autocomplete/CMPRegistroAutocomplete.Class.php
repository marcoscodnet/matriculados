<?php
class CMPRegistroAutocomplete extends CMPEntityAutocomplete{

	protected function getEntityClazz(){
		return "Registro";
	}

	protected function getFieldCode(){
		return "oid";
	}

	protected function getFieldSearch(){
		return "nombre,sigla";
	}
	
	
	protected function getEntityManager(){
		return ManagerFactory::getRegistroManager();
	}


	public function __construct(){
		$properties = array();
		$properties[] = "oid";
		$properties[] = "nombre";
		$properties[] = "sigla";
		$this->setPropertiesList($properties);
	}
	
	protected function getCriteria($text, $parent=null){
		
		$criterio = new CdtSearchCriteria();

		$tRegistro = DAOFactory::getRegistroDAO()->getTableName();
		
		
		$filter = new CdtSimpleExpression( "($tRegistro.nombre like '$text%') OR ($tRegistro.sigla like '$text%')");

		$criterio->setExpresion($filter);

		return $criterio;
	}

	

	protected function getItemDropDown( $entity ){
		$dropdownItem = "<div id='autocomplete_item_desc'><table><tr>";
		$dropdownItem .= "<td>".  $entity->getNombre() . "</td>";
		$dropdownItem .= "<td>".  $entity->getSigla() . "</td>";
		$dropdownItem .= "</tr></table></div>";
		return $dropdownItem;
	}

}
?>