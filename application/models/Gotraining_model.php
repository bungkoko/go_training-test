<?php
/**
 *
 */
class Gotraining_model extends CI_Model
{

    public function setMahasiswa()
    {
        $this->db->set('mahasiswa_nim', $this->input->post('mahasiswa_nim'));
        $this->db->set('mahasiswa_nm', $this->input->post('mahasiswa_nm'));
        $this->db->set('mahasiswa_jeniskelamin', $this->input->post('mahasiswa_jeniskelamin'));
        $this->db->set('mahasiswa_agama', $this->input->post('mahasiswa_agama'));
        $this->db->set('mahasiswa_alamat', $this->input->post('mahasiswa_alamat'));
        $this->db->set('dosen_dosen_nip', $this->input->post('dosen_dosen_nip'));
    }

    public function add_mahasiswa()
    {
        $this->setMahasiswa();
        return $this->db->insert('mahasiswa');
    }

    public function get_mahasiswa()
    {
        $this->db->join('dosen', 'dosen.dosen_nip=mahasiswa.dosen_dosen_nip', 'inner');
        return $this->db->get('mahasiswa');
    }

    public function get_dosen()
    {
        return $this->db->get('dosen');
    }

    public function delete_mahasiswa($mahasiswa_nim)
    {
        $this->db->where('mahasiswa_nim', $mahasiswa_nim);
        return $this->db->delete('mahasiswa');
    }

    public function read_mahasiswa($mahasiswa_nim)
    {
        $this->db->where('mahasiswa_nim', $mahasiswa_nim);
        return $this->db->get('mahasiswa')->row();
    }

    public function update_mahasiswa($mahasiswa_nim)
    {
    	$this->setMahasiswa();
    	$this->db->where('mahasiswa_nim',$mahasiswa_nim);
    	return $this->db->update('mahasiswa');
    }

}
