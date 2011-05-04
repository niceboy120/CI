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

class Plage_model extends Model {

     function  __construct() {
       
        // Call the Model constructor
        parent::Model();
    }

    function getAllPlage() {
		$data = array();
                $Q = $this->db->get('plage');
		if ($Q->num_rows()>0){
			foreach ($Q->result_array() as $row){
				$data[]=$row;
			}
		}
		$Q->free_result();
		return $data;
   }

}
?>