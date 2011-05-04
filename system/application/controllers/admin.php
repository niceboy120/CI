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
class Admin extends Controller {


        var $data =array();
        function __construct()
	{
		parent::Controller();
                //$this->output->enable_profiler(TRUE);
	}

	/////index function
        function index()
	{
            $data['mat']=$data['matiere'] = $this->Matiere_model->getAllMatieres();
            for($i=0;$i<count($data['matiere']);$i++)
            {
              $mat[$i]=$data['matiere'][$i]['nom'];
            }
            $data['matieres']=$mat;


            if($this->session->userdata('login')==TRUE)
            {
                if($this->session->userdata('isadmin')==TRUE)
                {
                    $this->session->set_userdata('isuser', FALSE);
                    $data['users']=$this->User_model->getAllUsers();
                    $data['cla']=$this->Classe_model->getAllClasses();
                     //$data['mat']=$this->Matiere_model->getAllMatieres();
                    $this->load->vars($data);
                   $this->load->view('admin/admin');
                }else if($this->session->userdata('isuser')==TRUE)
                {
                    $this->session->set_userdata('isadmin', FALSE);
                   // $this->load->view('user');
                    redirect('user');
                }

            }
            else if($this->input->post('passe'))
               {
                   $identite = $this->input->post('identite', TRUE);
                   $passe = $this->input->post('passe', TRUE);
                   $passe = sha1($passe);
                   $sql = "select * from prof where identite like \"".$identite."\" limit 1";
                   $query=$this->db->query($sql);
                   foreach ($query->result() as $row)
                  {
                            $data['t'][]= $row;

                  }

                  if ($passe == $data['t']['0']->passe)
                  {
                      $this->session->set_userdata('login', TRUE);
                      if($data['t']['0']->is_admin)
                      {
                          $this->session->set_userdata('isadmin', TRUE);
                          $this->session->set_userdata('isuser', FALSE);
                          $data['users']=$this->User_model->getAllUsers();
                          $data['cla']=$this->Classe_model->getAllClasses();
                          $this->load->vars($data);
                          $this->load->view('admin/admin');
                      }else{
                          $this->session->set_userdata('isuser', TRUE);
                          $this->session->set_userdata('isadmin', FALSE);
                          redirect('user');
                      }
                      //
                      
                  }else {
                       $this->session->set_userdata('login', FALSE);
                       $this->session->set_userdata('erreur', 'هناك خطأ في الرمز السري');
                       redirect('classe');
                        
                  }
         }else
        {
            $this->session->set_userdata('login', FALSE);
            $this->session->set_userdata('erreur', 'المرجو كتابة الرمز السري');
            redirect('classe');

         }
         
//end of function
	}

        /////////////////// Gestion des utilisateurs /////////////////
        function ajouterUser()
        {
            $data['matieres']= $this->Matiere_model->getAllMatieres();
            $this->load->view('admin/ajouterUser',$data);
            
        }
        function creerUser()
        {
            $this->User_model->addUser();
            redirect('admin');
        }
        function edit()
        {
            $id=$this->uri->rsegment(3);
            $data['user']=$this->User_model->getUserByID($id);
            $data['matieres']= $this->Matiere_model->getAllMatieres();
            $this->load->view('admin/editUser', $data);

        }
        function editUser()
        {
           $this->User_model->editUser();
           redirect('admin');

        }

        function removeUser()
        {
           $id=$this->uri->rsegment(3);
           $this->User_model->removeUser($id);
           redirect('admin');
        }
       

        //////////////////////// Gestion des classes //////////////////////
         function ajouterClasse()
        {
            $this->load->view('admin/ajouterClasse');
        }
        function creerClasse()
        {
            $this->Classe_model->addClasse();
            redirect('admin');
        }
        
        function editC()
        {
            $id=$this->uri->rsegment(3);
            $data['cla']=$this->Classe_model->getClasseByID($id);
            $this->load->view('admin/editClasse', $data);

        }
        function editClasse()
        {
           $this->Classe_model->editClasse();
           redirect('admin');

        }

        function removeClasse()
        {
           $id=$this->uri->rsegment(3);
           $this->Classe_model->removeClasse($id);
           redirect('admin');
        }

        ////////////////////////////////////////////////////////////
        //////////////////////// Gestion des matieres //////////////////////
         function ajouterMatiere()
        {
            $this->load->view('admin/ajouterMatiere');
        }
        function creerMatiere()
        {
            $this->Matiere_model->addMatiere();
            redirect('admin');
        }

        function editM()
        {
            $id=$this->uri->rsegment(3);
            $data['mat']=$this->Matiere_model->getMatiereByID($id);
            $this->load->view('admin/editMatiere', $data);

        }
        function editMatiere()
        {
           $this->Matiere_model->editMatiere();
           redirect('admin');

        }

        function removeMatiere()
        {
           $id=$this->uri->rsegment(3);
           $this->Matiere_model->removeMatiere($id);
           redirect('admin');
        }
        ///////////////////////////////////////////////////////////////////

        function admin()
        {
            if($this->session->userdata('isadmin')==TRUE)
                $this->load->view('admin/admin');
        
               
        }
        function user()
        {
            if($this->session->userdata('isuser')==TRUE)
                    $this->load->view('user');
            
        }
        function logout()
        {
            $this->session->sess_destroy();
            $this->session->unset_userdata('login');
            redirect('classe/index');
        }
}
?>