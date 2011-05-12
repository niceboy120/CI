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

class Emploi_model extends Model {

     function  __construct() {
       
        // Call the Model constructor
        parent::Model();
    }

    function getEmploiProf($id=0) {
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
    * 
    */
   function getClassesProf($idprof)
   {
       $data=array();
       $this->db->select('id_classe');
       $this->db->distinct();
       $this->db->orderby('id_classe','asc');
       $query = $this->db->get_where('emploi', array('id_prof' => $idprof));
	if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
                 $data[]= $row;
            return $data;
        }else
           $this->session->set_userdata('opClasse', 'لايدرس هذا الأستاذ أي قسم');
        
            
   }
   /////Ajout d'une séance dans l'emploi du prof
   function addEmploi()
        {

               $id_plage= $this->input->post('seance');
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
                //////////////////////////////////////////////////////////////
              

            $data = array(
              'id' => 0,
              'id_prof' => $this->session->userdata('id_user'),
              'id_classe' => $this->input->post('classe', true),
              'id_matiere' => $this->session->userdata('id_matiere'),
              'jour_semaine' => $this->input->post('jour', true),
              'id_plage' => $id_plage,
              'heure_debut' => $heure_debut,
               'heure_fin' => $heure_fin
            );

           $this->db->insert('emploi', $data);
           $this->session->set_userdata('opEmploi', 'تمت إضافة الحصة بنجاح');
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
        $this->session->set_userdata('opEmploi', 'تم تغيير المعلومات بنجاح');
    }

    function removeEmploi($id=0) {
        $this->db->delete('emploi', array('id' => $id), 1);
        $this->session->set_userdata('opEmploi', 'تم حذف الحصة بنجاح');
    }

}

?>