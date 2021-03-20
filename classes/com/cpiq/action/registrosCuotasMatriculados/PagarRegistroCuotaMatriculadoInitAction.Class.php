<?php

/**
 * Acción para inicializar el contexto
 * para editar una pago de cuota generada.
 *
 * @author Marcos
 * @since 20-03-2017
 *
 */

class PagarRegistroCuotaMatriculadoInitAction extends EditEntityInitAction {

	
	protected function getEntity(){

		$entity = parent::getEntity();
		//$oUser = CdtSecureUtils::getUserLogged();
		
		$oCriteria = new CdtSearchCriteria();
		
		$oCriteria->addFilter("matriculado_oid", $entity->getMatriculado()->getOid(), "=" );
		$tTitulo = DAOFactory::getTituloDAO()->getTableName();
		$oCriteria->addFilter("$tTitulo.tituloPrincipal", 1, "=" );
		$managerRegistroCuotaMatriculado =  ManagerFactory::getRegistroCuotaMatriculadoManager();
        $oRegistroCuotaMatriculados = $managerRegistroCuotaMatriculado->getEntities($oCriteria);
        $deudas = new ItemCollection();
        foreach ($oRegistroCuotaMatriculados as $oRegistroCuotaMatriculado) {
        	//print_r($oRegistroCuotaMatriculado->getMovCtaCte());
        	if (!$oRegistroCuotaMatriculado->getMovCtaCte()->getOid()) {
        		$deudas->addItem($oRegistroCuotaMatriculado);
        	}
        	else{
        		$managerMovCtaCte =  ManagerFactory::getMovCtaCteManager();
				$oMovCtaCte = $managerMovCtaCte->getObjectByCode($oRegistroCuotaMatriculado->getMovCtaCte()->getOid());
        		if($oMovCtaCte->getAnulacion()->getOid()){
        			$deudas->addItem($oRegistroCuotaMatriculado);
        		}
        	}
        }
        $html = '';
        $html .= '<table style="width:100%; border-style: solid; border-width: 1px;  border-color: #666;margin-bottom:5px">';
        if ($deudas->size()>0) {
        	
	        
	        foreach ($deudas as $deuda) {
	        	$managerRegistroCuota =  ManagerFactory::getRegistroCuotaManager();
				$oRegistroCuota = $managerRegistroCuota->getObjectByCode($deuda->getRegistroCuota()->getOid());
				$html .= '<tr style="border-style: solid; border-width: 1px; border-color: #666">
                        <td style="text-align:center;">'.$deuda->getRegistro()->getSigla().' - '.$deuda->getRegistroCuota()->getYear().'</td><td><label for="importe_'.$deuda->getOid().'">Importe *:</label><input class="txt" onChange="sumar_total(this);" id="importe_'.$deuda->getOid().'" name="importe_'.$deuda->getOid().'" value="'.$oRegistroCuota->getImporte().'" size="5" jval="{valid:function (val) { return required(val,\'Importe es requerido\')+number(val,\'no es un formato de número\'); }}" type="text"></td></tr>';
			}
			
        }
        else{
        	$html .= '<tr style="border-style: solid; border-width: 1px; border-color: #666">
                        <td>No registra deudas</td></tr>';
        }
	 	$html .= '</table>';
		$entity->setDs_contenido($html);
		
		
		//CYTSecureUtils::logObject($entity);
		return $entity;
	}
	
	protected function parseEntity($entity, XTemplate $xtpl) {

			
		
		parent::parseEntity($entity, $xtpl);
		
	}
	
	protected function getEntityManager(){
		
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		$form = new CMPPagarRegistroCuotaMatriculadoForm($action);
		
		return $form;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oPagarCuota = new PagarCuota();
		$filter = new CMPRegistroCuotaMatriculadoFilter();
		$filter->fillSavedProperties();
		$oPagarCuota->setMatriculado($filter->getMatriculado());
		return $oPagarCuota;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_CUOTA_PAGAR_CUOTA_GENERADA;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "pagar_registroCuotaMatriculado";
	}


}
