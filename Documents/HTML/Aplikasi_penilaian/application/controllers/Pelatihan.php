<?php


if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pelatihan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->page->setTitle('Pelatihan');
        $this->load->model('MKriteria');
        $this->load->model('MSubKriteria');
        $this->load->model('MPelatihan');
        $this->load->model('MNilai');
        $this->page->setLoadJs('assets/js/pelatihan');
    }

    public function index()
    {
        $data['pelatihan'] = $this->MPelatihan->getAll();
        loadPage('pelatihan/index', $data);
    }

    public function tambah($id = null)
    {

        if ($id == null) {
            if (count($_POST)) {
                $this->form_validation->set_rules('pelatihan', '', 'trim|required');
                if ($this->form_validation->run() == false) {
                    $errors = $this->form_validation->error_array();
                    $this->session->set_flashdata('errors', $errors);
                    redirect(current_url());
                } else {
	
                    $pelatihan = $this->input->post('pelatihan');
					$alamat=$this->input->post('alamat');
					$telp=$this->input->post('telp');
					$bidang=$this->input->post('bidang');

                    $nilai = $this->input->post('nilai');
					
					$query=$this->db->query("insert into pelatihan (kdPelatihan,pelatihan,alamat,telp,bidang) value ('','".$pelatihan."','".$alamat."','".$telp."','".$bidang."')");

					if ($query){
					 $this->session->set_flashdata('message', 'Berhasil menambah data :)');
                            redirect('pelatihan');
					}else {
                            echo 'gagal';
                        }
                    /* $this->MUniversitas->universitas = $universitas; */
                   /*  if ($this->MUniversitas->insert() == true) {
                        $success = false;
                        $kdUniversitas = $this->MUniversitas->getLastID()->kdUniversitas;
                        foreach ($nilai as $item => $value) {
                            $this->MNilai->kdUniversitas = $kdUniversitas;
                            $this->MNilai->kdKriteria = $item;
                            $this->MNilai->nilai = $value;
                            if ($this->MNilai->insert()) {
                                $success = true;
                            }
                        }
                        if ($success == true) {
                            $this->session->set_flashdata('message', 'Berhasil menambah data :)');
                            redirect('universitas');
                        } else {
                            echo 'gagal';
                        }
                    } */
                }
                //-----
            }else{
                $data['dataView'] = $this->getDataInsert();
                loadPage('pelatihan/tambah', $data);
            }
        }else{
            if(count($_POST)){
                $kdPelatihan = $this->uri->segment(3, 0);
                //dump($kdPelatihan);
				//die();
                if($kdPelatihan > 0){
                    $pelatihan = $this->input->post('pelatihan');
					$alamat=$this->input->post('alamat');
					$telp=$this->input->post('telp');
					//die($alamat);
                    //$nilai = $this->input->post('nilai');
					//$query_ku='UPDATE pelatihan SET pelatihan="'.$pelatihan.'", alamat="'.$alamat.'",telp="'.$telp.'" WHERE kdPelatihan="'.$kdPelatihan.'" ';
					//die($query_ku);
                    $query=$this->db->query('UPDATE pelatihan SET pelatihan="'.$pelatihan.'", alamat="'.$alamat.'",telp="'.$telp.'" WHERE kdPelatihan="'.$kdPelatihan.'" ');
                    //die();
					if($query){
                        $success = true;
                        /* foreach ($nilai as $item => $value) {
                            $this->MNilai->kdPelatihan = $kdPelatihan;
                            $this->MNilai->kdKriteria = $item;
                            $this->MNilai->nilai = $value;
                            if ($this->MNilai->update()) {
                                $success = true;
                            }
                        } */
                        if ($success == true) {
                            $this->session->set_flashdata('message', 'Berhasil mengubah data :)');
                            redirect('pelatihan');
                        } else {
                            echo 'gagal';
                        }
                    }
                }
            }
            $data['dataView'] = $this->getDataInsert();
            $data['nilaiPelatihan'] = $this->MNilai->getNilaiByPelatihan($id);
			//print_r($data['nilaiPelatihan']);
			//die();
            loadPage('pelatihan/tambah', $data);
        }

    }

	public function tambah_nilai(){
		 $data['dataView'] = $this->getDataInsert();
		 $data['datapelatihan']=$this->db->query('SELECT * FROM pelatihan')->result();
			
			$kd=$this->input->post('kdPelatihan');
			$nilai=$this->input->post('nilai');
		
		 if (!empty($kd)){
			 foreach ($nilai as $item => $value) {
                      /*        $kdUniversitas;
                             $item;
                            echo $kd." ".$item." ".$value; */
			 
                           $query=$this->db->query("insert into nilai (kdPelatihan,kdKriteria,nilai) value ('".$kd."','".$item."','".$value."')");
			 }
			  $datanya['pelatihan'] = $this->MPelatihan->getAll();
			  loadPage('pelatihan/index', $datanya);
		 }else{
			 loadPage('pelatihan/tambah_nilai', $data);
		 
		 }
	}

    private function getDataInsert()
    {
        $dataView = array();
        $kriteria = $this->MKriteria->getAll();
        foreach ($kriteria as $item) {
            $this->MSubKriteria->kdKriteria = $item->kdKriteria;
            $dataView[$item->kdKriteria] = array(
                'nama' => $item->kriteria,
                'data' => $this->MSubKriteria->getById()
            );
        }

        return $dataView;
    }
	
	public function getById(){
		echo "babi";
	}
	public function updatePelatihan()
    {
        if(count($_POST)){
            $this->form_validation->set_rules($this->getValidationUpdatePelatihan());
            if ($this->form_validation->run() == false) {
                $errors = $this->form_validation->error_array();
                $errors['valid'] = false;
                echo json_encode($errors);
            }else{
                $this->MPelatihan->pelatihan = $this->input->post('pelatihan', true);
                $this->MKriteria->alamat = $this->input->post('alamat', true);
                $this->MKriteria->telp = $this->input->post('telp', true);
                $where = array('kdPelatihan' => $this->input->post('kdPelatihan'));
                $update = $this->MPelatihan->update($where);
                if($update){
                    $this->session->set_flashdata('message','Berhasil mengubah data :)');
                    echo json_encode(array("status" => TRUE));
                }else{
                    echo json_encode(array("status" => FALSE));
                }
            }
        }

    }

    public function delete($id)
    {
        if($this->MPelatihan->delete($id) == true){
            if($this->MPelatihan->delete($id) == true){
                $this->session->set_flashdata('message','Berhasil menghapus data :)');
                echo json_encode(array("status" => 'true'));
            }
        }
    }
}