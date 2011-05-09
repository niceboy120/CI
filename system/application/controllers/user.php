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
                $this->tinyMce = '
			<!-- TinyMCE -->
			<script type="text/javascript" src="'. base_url().'system/js/tinymce/tiny_mce.js"></script>
			<script type="text/javascript">
				tinyMCE.init({
					// General options
					mode : "textareas",
                                        language : "ar",
					theme : "advanced",
                                        plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
 
                                        // Theme options
                                        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                                        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                                        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                                        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
                                        theme_advanced_toolbar_location : "top",
                                        theme_advanced_toolbar_align : "left",
                                        theme_advanced_statusbar_location : "bottom",
                                        theme_advanced_resizing : true,

                                        // Drop lists for link/image/media/template dialogs
                                        template_external_list_url : "lists/template_list.js",
                                        external_link_list_url : "lists/link_list.js",
                                        external_image_list_url : "lists/image_list.js",
                                        media_external_list_url : "lists/media_list.js"
                                });
                                </script>
			<!-- /TinyMCE -->
			';	
	}

	/////index function
        function index()
	{

            $data['matiere'] = $this->Matiere_model->getAllMatieres();
            for($i=0;$i<count($data['matiere']);$i++)
            {
              $mat[$i]=$data['matiere'][$i]['nom'];
            }
            $data['matieres']=$mat;
            $data['classes']=$this->Classe_model->getAllClasses();
            $base_url = site_url('user/user/');
            $config['base_url'] = $base_url;
            $config['per_page'] = '10';
            $config['first_link'] = 'الأول';
            $config['last_link'] = 'الأخير';
            $config['full_tag_open'] = '<p>';
            $config['full_tag_close'] = '</p>';

            if($this->session->userdata('login')==TRUE)
            {
                $data['id_user']=$this->session->userdata('id_user');
                $data['emploi']=$this->Emploi_model->getEmploiProf($data['id_user']);
                $data['plage']=$this->Plage_model->getAllPlage();
                
                if($this->session->userdata('isadmin')==TRUE)
                {
                    $this->session->set_userdata('isuser', FALSE);
                    redirect('admin');
                }else if($this->session->userdata('isuser')==TRUE)
                {
                    $this->session->set_userdata('isadmin', FALSE);
                    
                   $config['total_rows'] = count($this->Agenda_model->getAgendaProf($data['id_user']));
                    $this->pagination->initialize($config);
                    $data['agendaProf'] = $this->Agenda_model->getAgendaProfL($data['id_user'],$config['per_page'],(int)$this->uri->rsegment(3));
                          
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
                      $data['id_user']=$this->session->userdata('id_user');
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
                          
                          $config['total_rows'] = count($this->Agenda_model->getAgendaProf($this->session->userdata('id_user')));
                          $this->pagination->initialize($config);
                          $data['agendaProf'] = $this->Agenda_model->getAgendaProfL($this->session->userdata('id_user'),$config['per_page'],$this->uri->rsegment(3));
                          
                          
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
        
        
        function page()
        {
            $config['base_url'] = base_url().'/user/index/';
            $config['per_page'] = '15';
            $config['first_link'] = 'الأول';
            $config['last_link'] = 'الأخير';
            $config['full_tag_open'] = '<p>';
            $config['full_tag_close'] = '</p>';
            
            $config['total_rows'] = $this->Agenda_model->getAgendaProf($infoUser['id'])*60;
            $this->pagination->initialize($config);
            
            $data['agendaProf'] = $this->Agenda_model->getAgendaProf($infoUser['id'],$config['per_page'],$this->uri->segment(3));
            
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
            redirect('user');
            
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
