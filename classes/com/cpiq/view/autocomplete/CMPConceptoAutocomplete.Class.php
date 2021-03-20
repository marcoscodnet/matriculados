<?php
class CMPConceptoAutocomplete extends CMPEntityAutocomplete{

	protected function getEntityClazz(){
		return "Concepto";
	}

	protected function getFieldCode(){
		return "oid";
	}

	protected function getFieldSearch(){
		return "nombre";
	}
	
	protected function getFieldSearchParent(){
		return "concepto_oid";
	}
	protected function getEntityManager(){
		return ManagerFactory::getConceptoManager();
	}


	public function __construct(){
		$properties = array();
		$properties[] = "oid";
		$properties[] = "nombre";
		$this->setPropertiesList($properties);
	}

	
	protected function getCriteria($text, $parent=null){
		$criterio = new CdtSearchCriteria();

		$criterio->addFilter("bloqueado", 0, "=" );
		
		$tConcepto = DAOFactory::getConceptoDAO()->getTableName();
		$filterNombre  = new CdtFilterExpression( "$tConcepto.nombre", $text, "like", new CdtCriteriaFormatLikeValue());

		$criterio->setExpresion($filterNombre);

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