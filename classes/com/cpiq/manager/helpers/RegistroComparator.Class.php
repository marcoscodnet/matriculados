<?php
class RegistroComparator implements IItemComparator{
	
	function equals( $oObjeto1, $oObjeto2){
		return ($oObjeto1->getRegistroMatriculado()->getOid() == $oObjeto2->getRegistroMatriculado()->getOid());
	
	}
	
}