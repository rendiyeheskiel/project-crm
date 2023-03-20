<?php

class Surat_Proposal_Model extends CI_Model
{


    function construct()
    {
        parent::__construct();
    }

    function get_all_surat()
    {
        $query = $this->db->query("SELECT * FROM fibernode ORDER BY node ASC");

        $indeks = 0;
        $result = array();

        foreach ($query->result_array() as $row) {
            $result[$indeks++] = $row;
        }

        return $result;
    }

    function select_data_surat_byNode($node)
    {
        $this->db->select('*');
        $this->db->from('fibernode');
        $this->db->where('node', $node);

        return $this->db->get();
    }

    function delete_surat($node)
    {
        $this->db->where('node', $node);
        $this->db->delete('fibernode');
    }
}
