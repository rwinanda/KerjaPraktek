<?php

class daerah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Daerah_model');
        
    }
    
    public function index($id_prov, $hal=null)
        {
            $data['judul'] = 'Halaman Daerah';
            // $config['base_url'] = 'http://localhost/museumkp/daerah/index';
            //pagination
            $data['daerah'] = $this->Daerah_model->getDaerahById($id_prov);
            $data['id_provinsi'] = $id_prov;
            $this->load->library('pagination');
            $data["data_perhalaman"]=3;
            $data["halaman"] = isset($hal) ?$hal : 1;
            $data["halaman_awal"] = $data["halaman"] > 1 ?
            $data["data_perhalaman"]*$data["halaman"]-$data["data_perhalaman"] : 0;
        
            $data["sebelumnya"] = $data["halaman"] - 1;
            $data["berikutnya"] = $data["halaman"] + 1;
        
            $data["jumlah_data"] = count($this->Daerah_model->getDaerahById($id_prov));
            $data['total_halaman'] = ceil($data["jumlah_data"]/$data["data_perhalaman"]);
        
            //Pagination sukses berarti LIMIT OFFSET BENAR
            $data['daerah'] = $this->Daerah_model->getDaerahP($id_prov, $data['data_perhalaman'], $data['halaman_awal']);
            
            //searching
            if(isset($_POST['submit'])){
            $data['keyword'] = $this->input->post('keyword');
            $data['daerah'] = $this->Daerah_model->getDaerah($id_prov, ucwords($data['keyword']));
            // set session
            $this->session->set_userdata('keyword',$data['keyword']);
            }
            //load view
            $this->load->view('daerah/templates/header', $data);
            $this->load->view('daerah/index', $data);
            $this->load->view('daerah/templates/footer');
        }
    
    public function tambah($id)
        {
//            if(logged_in()){
                $data['judul'] = "Tambah Daerah";
                $data['id']    = $id; 
                $this->load->view('daerah/tambah', $data);
            }
//            else {
//                redirect('auth');
//            }

    public function prosesTambahDaerah($id)
        {
            $this->Daerah_model->tambahDaerah();
            redirect(base_url() . "daerah/index/".$id);

        }
    
    public function hapus($id, $id_daerah)
        {        
            $this->Daerah_model->hapusDaerah($id);
            redirect(base_url() . "daerah/index/". $id_daerah);
        }
    
    public function update($id)
        {
            $data['judul'] = 'Update Daerah';
            $data['daerah'] = $this->Daerah_model->getDaerahByIdUpdate($id);
            $data['id'] = $id;
            $this->load->view('daerah/update', $data);
        }
    
    public function prosesUpdateDaerah($id,$id_prov)
        {
        $this->Daerah_model->updateDaerah($id);
        redirect(base_url() . "daerah/index/".$id_prov);
//        echo "Sukses Update";
        }

//    public function list($id)
//        {
//            $data['judul'] = 'List Daerah';
//            $data['daerah'] = $this->Daerah_model->getDaerahById($id);
//            //if (logged_in()) {
//            $this->load->view('daerah/templates/header', $data);
//            $this->load->view('daerah/list', $data);
//            $this->load->view('daerah/templates/footer');
//        }
}