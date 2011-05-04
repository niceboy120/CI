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
class Classe extends Controller {

	function __construct()
	{
		parent::Controller();
                //$this->output->enable_profiler(TRUE);
                
	}
	
	function index()
	{
            
            if($this->session->userdata('login')==TRUE)
                    if($this->session->userdata('isadmin')==TRUE)
                         redirect('admin');
                    else if($this->session->userdata('isuser')==TRUE)
                            redirect('user');

                //$this->load->model('Classe_model','',TRUE);
		//$this->load->model('User_model','',TRUE);
		$data['classes']= $this->Classe_model->getAllClasses();
		$data['users']= $this->User_model->getAllUsers();
		//charge les données à transférer à la vue
		$this->load->vars($data);
		$this->load->view('classe');
                
            
         }
}
?>