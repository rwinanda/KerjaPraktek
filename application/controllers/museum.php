<?php

class museum extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Museum_model');
        
    }
    
    public function index($id_daerah, $hal=null)
    {
            // $config['base_url'] = 'http://localhost/museumkp/museum/index';
            $data['judul'] = 'Halaman Museum';
            //pagination
            $data['museum'] = $this->Museum_model->getMuseumById($id_daerah);
            $data['id_daerah'] = $id_daerah;
            $this->load->library('pagination');
            $data["data_perhalaman"]=3;
            $data["halaman"] = isset($hal) ?$hal : 1;
            $data["halaman_awal"] = $data["halaman"] > 1 ?
            $data["data_perhalaman"]*$data["halaman"]-$data["data_perhalaman"] : 0;
        
            $data["sebelumnya"] = $data["halaman"] - 1;
            $data["berikutnya"] = $data["halaman"] + 1;
        
            $data["jumlah_data"] = count($this->Museum_model->getMuseumById($id_daerah));
            $data['total_halaman'] = ceil($data["jumlah_data"]/$data["data_perhalaman"]);
            
            //Jika Pagination sukses berarti LIMIT OFFSET BENAR
            $data['museum'] = $this->Museum_model->getMuseumP($id_daerah, $data['data_perhalaman'], $data['halaman_awal']);
        
            //searching
            if(isset($_POST['submit'])){
            $data['keyword'] = $this->input->post('keyword');
            $data['museum'] = $this->Museum_model->getMuseum($id_daerah, ucwords($data['keyword']));
            // set session searching
            $this->session->set_userdata('keyword',$data['keyword']);
            }
            //load view
            $this->load->view('museum/templates/header', $data);
            $this->load->view('museum/index', $data);
            $this->load->view('museum/templates/footer');
    }
    
    public function tambah($id)
    {
            $data['judul'] = "Tambah Museum";
            $data['id']    = $id; 
            $this->load->view('museum/tambah', $data);
    }
        
    public function prosesTambahMuseum($id)
        {
            $this->Museum_model->tambahMuseum();
            redirect(base_url() . "museum/index/".$id);

        }
    
     public function update($id)
        {
            $data['judul'] = 'Update Museum';
            $data['museum'] = $this->Museum_model->getMuseumByIdUpdate($id);
            $data['id'] = $id;
            $this->load->view('museum/update', $data);
        }
    
    public function prosesUpdateMuseum($id,$id_daer)
        {
        $this->Museum_model->updateMuseum($id);
        redirect(base_url() . "museum/index/".$id_daer);
//        echo "Sukses Update";
        }
    
    public function hapus($id, $id_museum)
        {        
            $this->Museum_model->hapusMuseum($id);
            redirect(base_url() . "museum/index/".$id_museum);
        }

    public function cari()
    {
        $data['museum'] = $this->Museum_model->cariMuseum($_POST['query']);
        
        $this->load->view('museum/templates/header', $data);
        $this->load->view('museum/hasil', $data);
        $this->load->view('museum/templates/footer');
    }

}
