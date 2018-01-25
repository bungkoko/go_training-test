<?php
/**
 *
 */
class Gotraining_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function setMahasiswa()
    {
    	$this->db->set('mahasiswa_nim',$this->input->post('mahasiswa_nim'));
        $this->db->set('mahasiswa_nm', $this->input->post('mahasiswa_nm'));
        $this->db->set('mahasiswa_jeniskelamin', $this->input->post('mahasiswa_jeniskelamin'));
        $this->db->set('mahasiswa_agama', $this->input->post('mahasiswa_agama'));
        $this->db->set('mahasiswa_alamat', $this->input->post('mahasiswa_alamat'));
    }

    public function add_mahasiswa()
    {
    	$this->setMahasiswa();
    	return $this->db->insert('mahasiswa');
    }

}
