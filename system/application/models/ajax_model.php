<?php

class Ajax_model extends Model {

    function Ajax_model() {
        // Call the Model constructor
        parent::Model();
    }

    
    /*
     * renvoie les jours où une classe a une seance avec un prof
     */
    function getJoursClasseProf($idprof, $idclasse) {
        $data = array();
        $this->db->select('jour_semaine');
        $array = array('id_prof' => $idprof, 'id_classe' => $idclasse);
        $this->db->where($array);
        $this->db->order_by("jour_semaine", "asc");
        $Q = $this->db->get('emploi');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result() as $row) {
                $data[] = $row;
                
            }
            
            $Q->free_result();
            return $data;
        } else {
            return '<p>Sorry, no results returned.</p>';
        }
    }
    /*
     * renvoie l'heure de début et de fin pour un jour où une classe a une seance avec un prof
     */
    function getHeuresJour($idprof, $idclasse, $joursemaine) {
        $data = array();
        
        
        $array = array('id_prof' => $idprof, 'id_classe' => $idclasse,'jour_semaine' => $joursemaine);
        $this->db->where($array);
        $Q = $this->db->get('emploi');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result() as $row) {
                $data[] = $row;
                
            }
            
            $Q->free_result();
            return $data;
        } else {
            return '<p>Sorry, no results returned.</p>';
        }
    }

}
?>