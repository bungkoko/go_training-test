<?php
/**
 *
 */
class Go_training extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //$this->loop();
        $this->mahasiswa();
    }

    //menampilkan looping 1-100 :
    //kelipatan 3 : print "Go";
    //kelipatan 5 : print "training";
    //kelipatan 15 : print "Go training";
    public function loop()
    {
        for ($i = 1; $i < 100; $i++) {
            if ($i % 3 != 0 && $i % 5 != 0) {
                echo $i . '<br/>';
                continue;
            }
            if ($i % 3 == 0) {
                echo 'Go ';
            }
            if ($i % 5 == 0) {
                echo 'Training';
            }
            echo '<br/>';

        }

    }

    //insert mahasiswa
    public function mahasiswa()
    {
        $data['warning']       = '';
        $data['title']         = 'mahasiswa';
        $data['content']       = 'mahasiswa/mahasiswa_input';
        $data['get_dosen']     = $this->Gotraining_model->get_dosen();
        $data['get_mahasiswa'] = $this->Gotraining_model->get_mahasiswa();

        if ($this->input->post('submit')):
            $this->form_validation->set_rules('mahasiswa_nim', 'NIM', 'required');
            $this->form_validation->set_rules('mahasiswa_nm', 'nama', 'required');
            $this->form_validation->set_rules('mahasiswa_jeniskelamin', 'jenis kelamin', 'required');
            $this->form_validation->set_rules('mahasiswa_agama', 'agama', 'required');
            $this->form_validation->set_rules('mahasiswa_alamat', 'alamat', 'required');

            if ($this->form_validation->run() == true):
                $this->Gotraining_model->add_mahasiswa();
                $this->session->set_flashdata('message', 'berhasil menambahkan data mahasiswa');
                redirect('Go_training');
            else:
                $data['warning'] = validation_errors();
            endif;
        endif;

        $this->load->view('index', $data);
    }

    public function delete_mahasiswa($mahasiswa_nim)
    {
        $this->Gotraining_model->delete_mahasiswa($mahasiswa_nim);
        $this->session->set_flashdata('message', 'berhasil menghapus data mahasiswa');
        redirect('Go_training');
    }

    public function update_mahasiswa($mahasiswa_nim)
    {
        $data['warning']   = '';
        $data['title']     = 'Update Mahasiswa';
        $data['content']   = 'mahasiswa/mahasiswa_update';
        $data['readmhs']   = $this->Gotraining_model->read_mahasiswa($mahasiswa_nim);
        $data['get_dosen'] = $this->Gotraining_model->get_dosen();

        if ($this->input->post('submit')):
            $this->form_validation->set_rules('mahasiswa_nim', 'NIM', 'required');
            $this->form_validation->set_rules('mahasiswa_nm', 'nama', 'required');
            $this->form_validation->set_rules('mahasiswa_jeniskelamin', 'jenis kelamin', 'required');
            $this->form_validation->set_rules('mahasiswa_agama', 'agama', 'required');
            $this->form_validation->set_rules('mahasiswa_alamat', 'alamat', 'required');

            if ($this->form_validation->run() == true):
                $this->Gotraining_model->update_mahasiswa($mahasiswa_nim);
                $this->session->set_flashdata('message', 'berhasil mengubah data mahasiswa');
                redirect('Go_training');
            else:
                $data['warning'] = validation_errors();
            endif;
        endif;

        $this->load->view('index', $data);

    }


    function mahasiswa_has_matakuliah(){
    	$data['warning']='';
    	$data['gtmhs_has_matkul']=$this->Gotraining_model->get_mhs_has_matakuliah();
    	$data['content']='mahasiswa/mahasiswa_has_matakuliah';

    	$this->load->view('index',$data);
    }
}
