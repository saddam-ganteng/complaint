<?php

class M_rakyat extends CI_Model
{
    public function get_data_pengaduan($nik)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->where('nik', $nik);
        return $this->db->get()->result_array();
    }

    public function get_nik($email)
    {
        $this->db->select("nik");
        $this->db->from('masyarakat');
        $this->db->where('email', $email);
        return $this->db->get()->row_array();
    }

    public function show_kasus($id)
    {
        $this->db->where("id_pengaduan", $id);
        $query = $this->db->get("pengaduan");
        return $query->result();
    }
}
