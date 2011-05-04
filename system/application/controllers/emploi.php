<?php
/**
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Table $table
 * @property CI_Session $session
 * @property CI_FTP $ftp
 *
 */
class Emploi extends Controller {

	function __construct()
	{
		parent::Controller();
	}

	function index()
	{
            $this->load->model('Emploi_model','',TRUE);
            $data['emploi']=$this->Emploi_model->get_Emploi_Prof($this->uri->rsegment(3));
            $this->load->view('ecrireEmploi',$data);

	}
        function ecrire()
        {
            
        }
}

