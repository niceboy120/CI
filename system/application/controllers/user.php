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
class User extends Controller {


        var $data =array();
        function __construct()
	{
		parent::Controller();
                //$this->output->enable_profiler(TRUE);
                
	}

	/////index function
        function index()
	{

            //$this->load->model('Cahier_model','',TRUE);
            $data['matiere'] = $this->Matiere_model->getAllMatieres();
            for($i=0;$i<count($data['matiere']);$i++)
            {
              $mat[$i]=$data['matiere'][$i]['nom'];
            }
            $data['matieres']=$mat;
            $data['classes']=$this->Classe_model->getAllClasses();

            if($this->session->userdata('login')==TRUE)
            {
                $data['emploi']=$this->Emploi_model->getEmploiProf($this->session->userdata('id_user'));
                $data['plage']=$this->Plage_model->getAllPlage();
                if($this->session->userdata('isadmin')==TRUE)
                {
                    $this->session->set_userdata('isuser', FALSE);
                    redirect('admin');
                }else if($this->session->userdata('isuser')==TRUE)
                {
                    $this->session->set_userdata('isadmin', FALSE);
                    $this->load->vars($data);
                    $this->load->view('user/user');
                }

            }
            else if($this->input->post('passe'))
               {
                   $identite = $this->input->post('identite', TRUE);
                   $passe = $this->input->post('passe', TRUE);
                   $passe = sha1($passe);
                   $sql = "select * from user where identite like \"".$identite."\" limit 1";
                   $query=$this->db->query($sql);
                   foreach ($query->result() as $row)
                  {
                            $data['t'][]= $row;

                  }

                  $this->session->set_userdata('InfoUser', objectToArray($data['t']['0']));
                  if ($passe == $data['t']['0']->passe)
                  {
                      $this->session->set_userdata('login', TRUE);
                      $this->session->set_userdata('id_user',$data['t']['0']->id);
                      $this->session->set_userdata('id_user_matiere',$data['t']['0']->id_matiere);
                      $data['id_user']=$this->session->userdata('id_prof');
                      $data['emploi']=$this->Emploi_model->getEmploiProf($this->session->userdata('id_user'));
                      $data['plage']=$this->Plage_model->getAllPlage();
                      if($data['t']['0']->is_admin)
                      {
                          $this->session->set_userdata('isadmin', TRUE);
                          $this->session->set_userdata('isuser', FALSE);
                          //$data['users']=$this->User_model->getAllUsers();
                          //$this->load->vars($data);
                          //$this->load->view('admin/admin');
                          redirect('admin');
                      }else{
                          $this->session->set_userdata('isuser', TRUE);
                          $this->session->set_userdata('isadmin', FALSE);
                          $this->load->vars($data);
                          $this->load->view('user/user');
                      }
                      //
                      
                  }else {
                       $this->session->set_userdata('login', FALSE);
                       $this->session->unset_userdata('id_user');
                       $this->session->unset_userdata('id_user_matiere');
                       $this->session->set_userdata('erreur', 'هناك خطأ في الرمز السري');
                       redirect('classe');
                        
                  }
         }else
        {
            $this->session->set_userdata('login', FALSE);
            $this->session->unset_userdata('id_user');
            $this->session->unset_userdata('id_user_matiere');
            $this->session->set_userdata('erreur', 'المرجو كتابة الرمز السري');
            redirect('classe');

         }
         
	
        //end of function
	}
        
        /*
         * Pour ajouter  une séance à un cahier de texte
         */
        function ajoutAgenda()
        {
            $this->Agenda_model->addAgenda();
            redirect('user');
        }
       ////////////////////Modifier une séance dans un emploi 
        function editAgenda()
        {
            $data['id_agenda']=$this->uri->rsegment(3);
           // $data['plage']=$this->Plage_model->getAllPlage();
            //$data['classes']=$this->Classe_model->getAllClasses();
            $this->load->view('user/editAgenda',$data);
        }
        function editA()
        {
            $this->Agenda_model->editAgenda();
            redirect('user');
        }
       ///////////////////Pour ajouter une seance à un emploi
        function ajoutEmploi()
        {
            $this->Emploi_model->addEmploi();
            redirect('user');
        }
        ////////////////////Modifier une séance dans un emploi 
        function editEmploi()
        {
            $data['id_emploi']=$this->uri->rsegment(3);
            $data['plage']=$this->Plage_model->getAllPlage();
            $data['classes']=$this->Classe_model->getAllClasses();
            $this->load->view('user/editEmploi',$data);
        }
        function editE()
        {
            $this->Emploi_model->editEmploi();
            redirect('user');
        }
        function removeEmploi()
        {
             $id=$this->uri->rsegment(3);
            $this->Emploi_model->removeEmploi($id);
            redirect('user');
        }

        function admin()
        {
            if($this->session->userdata('isadmin')==TRUE)
                $this->load->view('admin/admin');
        
               
        }
        function user()
        {
            if($this->session->userdata('isuser')==TRUE)
                    $this->load->view('user/user');
            
        }
        function logout()
        {
            $this->session->sess_destroy();
            $this->session->unset_userdata('login');
            $this->session->unset_userdata('id_user');
            $this->session->unset_userdata('id_user_matiere');
            redirect('classe/index');
        }
}
?>
