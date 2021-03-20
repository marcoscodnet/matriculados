<?php 

/** 
 * Manager para CPIQRegistration
 *  
 * @author Marcos
 * @since 28-10-2013
 */ 
class CPIQRegistrationManager extends CdtRegistrationManager{ 

	
	
	/**
	 * se agrega la nueva entity
	 * @param CdtRegistration $oCdtRegistration entity a agregar.
	 */
	public function addCdtRegistration(CdtRegistration $oCdtRegistration) { 

		//validaciones;
		$this->validateRegistration( $oCdtRegistration );
		
		//generamos un c�digo de activaci�n y asignamos la fecha.
		$ds_activationCode=md5(uniqid(rand()));
		$dt_date = date('Ymd');

		$oCdtRegistration->setDs_activationcode( $ds_activationCode );
		$oCdtRegistration->setDt_date( $dt_date );
		//persistir en la bbdd.
		$this->getCdtRegistrationDAO()->addCdtRegistration($oCdtRegistration);
		
		//env�o del email al futuro usuario con el c�digo de activaci�n.
		$subject = CDT_SECURE_MSG_REGISTRATION_EMAIL_SUBJECT;
		//$nameTo = $oCdtRegistration->getDs_username();
		$to = $oCdtRegistration->getDs_email();
		
		$activationLink = WEB_PATH . CDT_SECURE_ACTIVATE_REGISTRATION_ACTION . '&activationcode=' . $ds_activationCode;
		
		$xtpl = new XTemplate( CDT_SECURE_TEMPLATE_ACTIVATE_REGISTRATION_EMAIL );
		$xtpl->parse('main');
		$msg = $xtpl->text('main');
		
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('nroDocumento', $oCdtRegistration->getDs_username(), '=');
		
		$managerMatriculado =  ManagerFactory::getMatriculadoManager();
		$oMatriculado = $managerMatriculado->getEntity($oCriteria);
		if (empty($oMatriculado)) {
			throw new GenericException( CPIQ_SECURE_MSG_ACTIVATION_MATRICULADO_ERROR );			
		}
		else{
			$nameTo = $oMatriculado->getNombre().' '.$oMatriculado->getApellido();
		}
		
		$params[] = $nameTo;
		$params[] = $activationLink;
        $msg = CdtFormatUtils::formatMessage($msg, $params);
		
        
        CdtUtils::sendMail( $nameTo, $to, $subject, $msg );
        
		
	}

	
} 
?>
