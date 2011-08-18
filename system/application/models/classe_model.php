<?php
class Classe_model extends Model {

     function Classe_model()
    {
        // Call the Model constructor
        parent::Model();
    }
	function getAllClasses() {
		$data = array();
		$Q = $this->db->get('classe');
		if ($Q->num_rows()>0){
			foreach ($Q->result_array() as $row){
				$data[]=$row;
			}
		}
		$Q->free_result();
		return $data;
	}

        ///////////Ajout d'une classe ///////////////
        function addClasse()
        {
            $data = array(
                'id' => 0,
                'nom' => $this->input->post('nom', true),
              );

           $this->db->insert('classe', $data);
           $this->session->set_userdata('opClasse', 'تمت إضافة القسم الجديد');
        }
        //Editer les informations d'une classe
        function editClasse()
        {
            $data = array(
                'nom' => $this->input->post('nom', true),
            );
            $this->db->where('id', $this->input->post('id', true));
           $this->db->update('classe', $data);
           $this->session->set_userdata('opClasse','تم تغيير المعلومات بنجاح');
        }
         //Supprimer une classe
        function removeClasse($id=0)
        {
           $this->db->delete('classe', array('id' => $id), 1);
           $this->session->set_userdata('opClasse','تم حذف القسم بنجاح');
        }
         //recuperer la classe par son ID
       function getClasseByID($id=0)
       {
                $query = $this->db->get_where('classe', array('id' => $id), 1);
		foreach ($query->result() as $row)
                {
                    $data['c'][]= $row;

                }
                if(!isset ($data))
                     $this->session->set_userdata('opClasse', 'لا يوجد قسم');
                else
                    return $data['c']['0'];

       }
       function getClasseByNom($nom='')
       {
                $query = $this->db->get_where('classe', array('nom' => $nom), 1);
		foreach ($query->result() as $row)
                {
                    $data['c'][]= $row;

                }
                if(!isset ($data))
                     $this->session->set_userdata('opClasse', 'لا يوجد قسم بهذا الإسم');
                else
                    return $data['c']['0'];

       }
       function getClasseNom($id=0)
       {
           $query = $this->db->get_where('classe', array('id' => $id), 1);
		foreach ($query->result() as $row)
                {
                    $data['c'][]= $row;

                }
                if(!isset ($data))
                     $this->session->set_userdata('opClasse', 'لا يوجد قسم');
                else
                    return $data['c']['0']->nom;
       }
    
}
?>