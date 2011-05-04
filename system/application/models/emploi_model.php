﻿<?php
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
    
    function getAgendaProf($id=0) {
		$data = array();
                //$sql="select * from emploi where id_prof=$id";
                $this->db->where('id_prof', $id);
                $this->db->order_by("jour_semaine", "asc");
                $this->db->order_by("id_plage", "asc");
		$Q = $this->db->get('emploi');
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
                if(isset($this->input->post('contenuTravailAfaire'))) $travailAfaire=1;
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
         function editEmploi()
        {

               $id_plage=$this->input->post('seance', true);
                $sql1="SELECT *
                FROM plage
                WHERE id ='".$id_plage."' limit 1";
                $query=$this->db->query($sql1);
		foreach ($query->result() as $row)
                {
                    $data['m'][]= $row;

                }
                $heure_debut=$data['m']['0']->h1."H".$data['m']['0']->mn1."mn";
                $heure_fin=$data['m']['0']->h2."H".$data['m']['0']->mn2."mn";
                //////////////////////////////////////////////
            $data = array(
                'id' => $this->input->post('id', true),
              'id_prof' => $this->session->userdata('id_user'),
              'id_classe' => $this->input->post('classe', true),
              'id_matiere' => $this->session->userdata('id_user_matiere'),
              'jour_semaine' => $this->input->post('jour', true),
              'id_plage' => $id_plage,
               'heure_debut' => $heure_debut,
                'heure_fin' => $heure_fin
            );
            $this->db->where('id', $this->input->post('id', true));
           $this->db->update('emploi', $data);
           $this->session->set_userdata('opEmploi','تم تغيير المعلومات بنجاح');
        }
        function removeEmploi($id=0)
        {
            $this->db->delete('emploi', array('id' => $id), 1);
           $this->session->set_userdata('opEmploi','تم حذف الحصة بنجاح');
            
        }
}
?>