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
 * @property CI_Calendar $calendar
 *
 */
class Matiere extends Controller {

    function Matiere()
	{
		parent::Controller();
	}

	function index()
	{
		//$this->load->model('Matiere_model','',TRUE);
		$data['matieres']= $this->Matiere_model->getMatieres($this->input->post('classe',TRUE));
                $this->session->set_userdata('classe', $this->input->post('classe',TRUE));
                
                //charge les données à transférer à la vue
		$this->load->vars($data);
		$this->load->view('matiere');

	}

}
?>
