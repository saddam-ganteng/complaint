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
    //CETAK
    function fetch_single_details()
    {
        $data = $this->db->get('masyarakat');
        $output = '<table border="1" width="100%" cellspacing="0" cellpadding="15">';

        $output .= ' <tr align="center">
		                <th width="20%">nik</th>
		                <th width="20%">nama</th>
		                <th width="20%">telp</th>
                        <th width="20%">email</th>
                        <th width="20%">foto</th>
		              </tr>';
        foreach ($data->result() as $row) {
            $output .= '
                <tr>	
                    <td>' . $row->nik . '</td>
                    <td>' . $row->nama . '</td>
                    <td>' . $row->telp . '</td> 
                    <td>' . $row->email . '</td>
                    <td><img src="' . base_url() . 'assets/img/' . $row->foto . '" height="100"></td>
                </tr> ';
        }

        // $output .= '<tr>
        // 	              <td colspan="2" align="center"><a href="'.base_url().'htmltopdf" class="btn btn-primary">Back</a></td>
        //             </tr>';
        $output .= '</table>';
        return $output;
    }

    public function get_user()
    {
        $data = $this->db->get('masyarakat');
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
}
