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

class Matiere_model extends Model{

    function __construct()
    {
        // Call the Model constructor
        parent::Model();
    }

        /// liste des matières pour une classe données
        function getMatieres($nom_classe = null) {
		$data = array();
		//$this->load->model('Matiere_model','',TRUE);
                //$this->load->model('Prof_model','',TRUE);
                $sql1="SELECT m.nom
                FROM classe AS cl, user AS u, enseigner AS e, matiere as m
                WHERE (
                cl.id = e.id_classe
                AND u.id = e.id_prof
                AND m.id = u.id_matiere
                AND cl.nom ='".$nom_classe."')";
                $query=$this->db->query($sql1);
		foreach ($query->result() as $row)
                {
                    $data['m'][]= $row;

                }
                
		return $data;
	}

        //liste de toutes les matières
        function getAllMatieres()
        {
            $data = array();
		$Q = $this->db->get('matiere');
		if ($Q->num_rows()>0){
			foreach ($Q->result_array() as $row){
				$data[]=$row;
			}
		}
		$Q->free_result();
		return $data;
        }
        ///////////Ajout d'une classe ///////////////
        function addMatiere()
        {
            $data = array(
                'id' => 0,
                'nom' => $this->input->post('nom', true),
              );

           $this->db->insert('matiere', $data);
           $this->session->set_userdata('opMat', 'تمت إضافة المادة الجديدة');
        }
        //Editer les informations d'une classe
        function editMatiere()
        {
            $data = array(
                'nom' => $this->input->post('nom', true),
            );
            $this->db->where('id', $this->input->post('id', true));
           $this->db->update('matiere', $data);
           $this->session->set_userdata('opMat','تم تغيير معلومات المادة بنجاح');
        }
         //Supprimer une classe
        function removeMatiere($id=0)
        {
           $this->db->delete('matiere', array('id' => $id), 1);
           $this->session->set_userdata('opMat','تم حذف المادة بنجاح');
        }

        function getMatiereByNom($nom='')
        {
                $query = $this->db->get_where('matiere', array('nom' => $nom), 1);
		foreach ($query->result() as $row)
                {
                    $data['c'][]= $row;

                }
                if(!isset ($data))
                     $this->session->set_userdata('opMat', 'لا توجد مادة بهذا الإسم');
                else
                    return $data['c']['0'];
            
        }
         function getMatiereByID($id=0)
        {
               $query = $this->db->get_where('matiere', array('id' => $id), 1);
		foreach ($query->result() as $row)
                {
                    $data['c'][]= $row;

                }
                if(!isset ($data))
                     $this->session->set_userdata('opMat', 'لا توجد المادة');
                else
                    return $data['c']['0'];
        }
}
?>
