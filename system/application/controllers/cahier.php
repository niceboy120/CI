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
 */
class Cahier extends Controller{

    function __construct()
	{
		parent::Controller();
                $this->load->model('Cahier_model','',TRUE);
                //$this->output->enable_profiler(TRUE);
	}
    function index(){
        
        if($this->input->post('matiere',TRUE)){
            $this->session->set_userdata('matiere', $this->input->post('matiere',TRUE));
            $data['classe']=$this->session->userdata('classe');
            $data['matiere']=$this->session->userdata('matiere');
            $this->load->vars($data);
            $this->load->view('cahier');
        } else {
            redirect('classe/index');
        }

    }


}
?>
