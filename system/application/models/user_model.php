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
class User_model extends Model {

     function __construct()
    {
        // Call the Model constructor
        parent::Model();
        $data =array();
    }
	function getAllUsers()
        {
		$Q = $this->db->get('user');
		if ($Q->num_rows()>0){
			foreach ($Q->result_array() as $row){
				$data[]=$row;
			}
		}
		$Q->free_result();
		return $data;
	}
        function addUser()
        {
            
            $passe =sha1($this->input->post('passe', true));
            $matiere = $this->input->post('matiere', true);
            
            $sql1="SELECT id
                FROM matiere
                WHERE nom ='".$matiere."' limit 1";
                $query=$this->db->query($sql1);
		foreach ($query->result() as $row)
                {
                    $data['m'][]= $row;

                }
                $id_matiere= $data['m']['0']->id;
            //////////////////////////////////////////////////////////////
            
            $data = array(
                'id' => 0,
              'nom' => $this->input->post('nom', true),
              'prenom' => $this->input->post('prenom', true),
              'identite' => $this->input->post('identite', true),
              'passe' => $passe,
              'email' => $this->input->post('email', true),
              'id_matiere' => $id_matiere,
               'is_admin' => $this->input->post('isadmin', true)
            );
            
           $this->db->insert('user', $data);
           $this->session->set_userdata('opUser', ' تمت إضافة المستعمل الجديد بنجاح');
        }

        //Editer les informations de l'utilisateur
        function editUser()
        {

            $passe =sha1($this->input->post('passe', true));
            $matiere = $this->input->post('matiere', true);

            $sql1="SELECT id
                FROM matiere
                WHERE nom ='".$matiere."' limit 1";
                $query=$this->db->query($sql1);
		foreach ($query->result() as $row)
                {
                    $data['m'][]= $row;

                }
                $id_matiere= $data['m']['0']->id;
            //////////////////////////////////////////////////////////////

            $data = array(
                'nom' => $this->input->post('nom', true),
              'prenom' => $this->input->post('prenom', true),
              'identite' => $this->input->post('identite', true),
              'passe' => $passe,
              'email' => $this->input->post('email', true),
              'id_matiere' => $id_matiere,
               'is_admin' => $this->input->post('isadmin', true)
            );
            $this->db->where('id', $this->input->post('id', true));
           $this->db->update('user', $data);
           $this->session->set_userdata('opUser','تم تغيير المعلومات بنجاح');
        }

        //Supprimer un utilisateur
        function removeUser($id=0)
        {
           $this->db->delete('user', array('id' => $id), 1);
           $this->session->set_userdata('opUser','تم حذف المستعمل بنجاح');
        }
        //recevoir l'utilisateur par son ID
       function getUserByID($id=0)
       {
                $query = $this->db->get_where('user', array('id' => $id), 1);
		foreach ($query->result() as $row)
                {
                    $data['u'][]= $row;

                }
                if(!isset ($data))
                     $this->session->set_userdata('opUser', 'لايوجد مستعمل');
                else
                    return $data['u']['0'];

       }
       function getUserByNom($nom='')
       {
                $query = $this->db->get_where('user', array('nom' => $nom), 1);
		foreach ($query->result() as $row)
                {
                    $data['u'][]= $row;

                }
                if(!isset ($data))
                     $this->session->set_userdata('opUser', 'لا يوجد مستعمل بهذا الإسم');
                else
                    return $data['u']['0'];

       }
       function check($identite='')
       {
           
           $query = $this->db->get_where('user', array('identite' => $identite), 1);
            $num=$query->num_rows();
           return $num;
       }
    
}
?>