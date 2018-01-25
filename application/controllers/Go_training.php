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
        $this->loop();

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
    function mahasiswa(){
    	$data['warning']='';
    	$data['content']='mahasiswa/mahasiswa_input';

    	if($this->input->post('submit')):
    		$this->form_validation->set_rules('mahasiswa_nim','NIM','required');
    		$this->form_validation->set_rules('mahasiswa_nm','nama','required');
    		$this->form_validation->set_rules('mahasiswa_jeniskelamin','jenis kelamin','required');
    		$this->form_validation->set_rules('mahasiswa_agama','agama','required');
    		$this->form_validation->set_rules('mahasiswa_alamat','alamat','required');

    		if($this->form_validation->run()==TRUE):
    			$this->Gotraining_model->add_mahasiswa();
    			redirect('Go_training/mahasiswa');
    		endif;
    	endif;
    }

}
