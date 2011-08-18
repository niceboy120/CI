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

class Typeactivite_model extends Model {

     function  __construct() {
       
        // Call the Model constructor
        parent::Model();
    }

    function getAllTypeActivite() {
		$data = array();
                $Q = $this->db->get('type_activite');
		if ($Q->num_rows()>0){
			foreach ($Q->result_array() as $row){
				$data[]=$row;
			}
		}
		$Q->free_result();
		return $data;
   }
   function getTypeID($nom="")
       {
           $query = $this->db->get_where('type_activite', array('nom' => $nom), 1);
		foreach ($query->result() as $row)
                {
                    $data['c'][]= $row;

                }
                if(!isset ($data))
                     $this->session->set_userdata('opType', 'لا يوجد نوع بهذا الإسم');
                else
                    return $data['c']['0']->id;
       }

}
?>