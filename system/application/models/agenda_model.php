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

class Agenda_model extends Model {

     function  __construct() {
       
        // Call the Model constructor
        parent::Model();
    }
    /*
     * Fonction pour récupérer le cahier de texte d'une classe selon son id
     */
    function getAgendaClasse($id=0){
        $data =array();
        $this->db->where('id_classe',$id);
        $this->db->order_by("id_prof", "asc");
        $this->db->order_by("jour", "asc");
        $this->db->order_by("heureDebut", "asc");
        $Q = $this->db->get('agenda');
        if ($Q->num_rows()>0){
			foreach ($Q->result_array() as $row){
				$data[]=$row;
			}
		}
		$Q->free_result();
		return $data;        
    }
    /*
     * Fonction pour récupérer le cahier de texte d'une classe pour une matière spécifique(prof)
     */
    function getAgendaClasseProf($idclasse=0, $idprof=0){
        $data =array();
        $this->db->where('id_classe',$idclasse);
        $this->db->where('id_prof',$idprof);
        $this->db->order_by("jour", "asc");
        $this->db->order_by("heureDebut", "asc");
        $Q = $this->db->get('agenda');
        if ($Q->num_rows()>0){
			foreach ($Q->result_array() as $row){
				$data[]=$row;
			}
		}
		$Q->free_result();
		return $data;        
    }
    
    /*
     * Avoir le cahier de texte d'un prof
     */
    function getAgendaProf($id=0) {
		$data = array();
                $this->db->where('id_prof', $id);
                $this->db->order_by("jour", "asc");
                $this->db->order_by("heureDebut", "asc");
		$Q = $this->db->get('agenda');
		if ($Q->num_rows()>0){
			foreach ($Q->result_array() as $row){
				$data[]=$row;
			}
		}
		$Q->free_result();
		return $data;
   }
   /*
     * Avoir le cahier de texte d'un prof
     */
    function getAgendaProfL($id=0,$num= NULL, $offset = NULL) {
		$data = array();
                $this->db->where('id_prof', $id);
                $this->db->order_by("jour", "asc");
                $this->db->order_by("heureDebut", "asc");
                $this->db->limit($num, $offset);
		$Q = $this->db->get('agenda');
		if ($Q->num_rows()>0){
			foreach ($Q->result_array() as $row){
				$data[]=$row;
			}
		}
		$Q->free_result();
		return $data;
   }
   
   /*
    * Remplir le cahier de texte d'une classe
    */
   function addAgenda()
        {

                /*
                *Extraction de l'id du type de l'activité choisie
                */
                $typeactivite= $this->input->post('typeactivite');
                $sql1="SELECT id
                FROM type_activite
                WHERE nom ='".$typeactivite."' limit 1";
                $query=$this->db->query($sql1);
		foreach ($query->result() as $row)
                {
                    $data['m'][]= $row;

                }
                $idtypeactivite=$data['m']['0']->id;                
                //////////////////////////////////////////////////////////////
                $contenuTravailAfaire= $this->input->post('contenuTravailAfaire');
                if(isset($contenuTravailAfaire)) $travailAfaire=1;
                else $travailAfaire=0;
                
            $data = array(
              'id' => 0,
              'id_classe' => $this->input->post('classe', true),
              'id_prof' => $this->session->userdata('id_user'),
              'id_type_activite' => $idtypeactivite,
              'id_matiere' => $this->session->userdata('id_user_matiere'),
              'jour' => $this->input->post('jour', true),
              'heureDebut' => $this->input->post('heureDebut', true),
              'heureFin' => $this->input->post('heureFin', true),
              'titreActivite' => $this->input->post('titreActivite', true),
              'travailAfaire'=> $travailAfaire,
              'activite' => $this->input->post('activite', true),
              'remarque' => $this->input->post('remarque', true)
              
            );

           $this->db->insert('agenda', $data);
           $this->session->set_userdata('opAgenda', 'تمت إضافة الحصة بنجاح');
        }
        //////////////////////////////
         function editAgenda()
        {

               /*
                *Extraction de l'id du type de l'activité choisie
                */
                $typeactivite= $this->input->post('typeactivite');
                $sql1="SELECT id
                FROM type_activite
                WHERE nom ='".$typeactivite."' limit 1";
                $query=$this->db->query($sql1);
		foreach ($query->result() as $row)
                {
                    $data['m'][]= $row;

                }
                $idtypeactivite=$data['m']['0']->id;                
               //////////////////////////////////////////////////////////////
                $contenuTravailAfaire= $this->input->post('contenuTravailAfaire');
                if(isset($contenuTravailAfaire)) $travailAfaire=1;
                else $travailAfaire=0;
                //////////////////////////////////////////////
            $data = array(
              'id' => $this->input->post('id', true),
              'id_classe' => $this->input->post('classe', true),
              'id_prof' => $this->session->userdata('id_user'),
              'id_type_activite' => $idtypeactivite,
              'id_matiere' => $this->session->userdata('id_user_matiere'),
              'jour' => $this->input->post('jour', true),
              'heureDebut' => $this->input->post('heureDebut', true),
              'heureFin' => $this->input->post('heureFin', true),
              'titreActivite' => $this->input->post('titreActivite', true),
              'travailAfaire'=> $travailAfaire,
              'activite' => $this->input->post('activite', true),
              'remarque' => $this->input->post('remarque', true)
              
            );
            $this->db->where('id', $this->input->post('id', true));
           $this->db->update('agenda', $data);
           $this->session->set_userdata('opAgenda','تم تغيير المعلومات بنجاح');
        }
        
        
        /*
         * Fonction pour supprimer une séance d'agenda à partir de son id
         */
        function removeAgenda($id=0)
        {
            $this->db->delete('agenda', array('id' => $id), 1);
           $this->session->set_userdata('opAgenda','تم حذف الحصة بنجاح');
            
        }
}
?>
