<?php

class M_admin extends CI_Model
{

    //generate dataTable serverside method
    function get_all_rakyat()
    {
        $this->datatables->select('nik,nama,telp,email,foto');
        $this->datatables->from('masyarakat');
        $this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-success" data-nik="$1" data-name="$2" data-telp="$3" data-email="$4" data-foto="$5">Edit</a>  <a href="javascript:void(0);" class="delete_record btn btn-danger" data-nik="$1">Delete</a>', 'nik,nama,telp,email,foto');
        return $this->datatables->generate();
    }
    //generate dataTable serverside method
    function get_all_admin()
    {
        $this->datatables->select('id_petugas,nama,telp,email,foto,level');
        $this->datatables->from('petugas');
        $this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-success" data-id_petugas="$1" data-name="$2" data-telp="$3" data-email="$4" data-foto="$5" data-level="$6">Edit</a>  <a href="javascript:void(0);" class="delete_record btn btn-danger" data-id_petugas="$1">Delete</a>', 'id_petugas,nama,telp,email,foto,level');
        return $this->datatables->generate();
    }
    //INSERT RAKYAT
    function insert_rakyat()
    {
        $data = array(
            'nik'         => $this->input->post('nik'),
            'nama'        => $this->input->post('nama'),
            'password'  => $this->input->post('password'),
            'telp'        => $this->input->post('telp'),
            'email'  => $this->input->post('email'),
            'foto'  => $this->input->post('foto')
        );
        $result = $this->db->insert('masyarakat', $data);
        return $result;
    }
    public function insert($data)
    {
        $this->db->insert('masyarakat', $data);
        return TRUE;
    }

    //UPDATE RAKYAT
    function update_rakyat()
    {
        $nik = $this->input->post('nik');
        $data = array(
            'nik'         => $this->input->post('nik'),
            'nama'        => $this->input->post('nama'),
            'telp'        => $this->input->post('telp'),
            'email'  => $this->input->post('email')
        );
        $this->db->where('nik', $nik);
        $result = $this->db->update('masyarakat', $data);
        return $result;
    }
    //DELETE RAKYAT
    function delete_rakyat()
    {
        $nik = $this->input->post('nik');
        $this->db->where('nik', $nik);
        $result = $this->db->delete('masyarakat');
        return $result;
    }
    //HITUNG JUMLAH SELESAI
    public function jumlah_selesai()
    {
        $sql = "SELECT count(if(status='selesai', status, NULL)) as status FROM pengaduan";
        $result = $this->db->query($sql);
        return $result->row();
    }
    //HITUNG JUMLAH PROSES
    public function jumlah_proses()
    {
        $sql = "SELECT count(if(status='proses', status, NULL)) as status FROM pengaduan";
        $result = $this->db->query($sql);
        return $result->row();
    }
    //HITUNG USER
    public function hitungJumlahrakyat()
    {
        $query = $this->db->get('masyarakat');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    //HITUNG USER
    public function hitungJumlahpetugas()
    {
        $query = $this->db->get('petugas');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    //HITUNG KASUS
    public function hitungJumlahkasus()
    {
        $query = $this->db->get('pengaduan');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function get_masyarakat()
    {
        $data = $this->db->get('masyarakat');
        return $data->result();
    }
    public function get_petugas()
    {
        $data = $this->db->get('petugas');
        return $data->result();
    }


    public function count_user()
    {
        $data = $this->db->get('masyarakat');
        return $data->num_rows();
    }

    //UPDATE PROFILE
    public function get_by_id()
    {
        $id = $this->session->userdata('id');
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_report()
    {
        $data = $this->db->get('pengaduan');
        return $data->result();
    }

    public function show_kasus($id)
    {
        $this->db->where("id_pengaduan", $id);
        $query = $this->db->get("pengaduan");
        return $query->result();
    }
}
