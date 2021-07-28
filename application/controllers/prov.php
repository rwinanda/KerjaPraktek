<?php

class prov extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Provinsi_model');
        $this->load->library('pagination'); //load library pagination
        
        
    }
    
    public function index()
    {       
            $config['base_url'] = 'http://museum.test/prov/index';
            $data['judul'] = 'Halaman Provinsi';
        
            //Pagination
            $config['total_rows'] = $this->Provinsi_model->countAllProv();
            //data yang ditampilkan per halaman
            $config['per_page'] = 3;
            //jumlah kolom halaman kiri dan kanan
            $config['num_links'] = 2;
            //styling
            $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
            $config['full_tag_close'] = '</ul></nav>';
        
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            //Tombol Next
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            //Tombol Previus
            $config['prev_link'] = 'Prev';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            //Tombol saat diklik
            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';
            
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
        
            $config['attributes'] = array('class' => 'page-link');
            //initialize
            $this->pagination->initialize($config);
            
            $data['start'] = $this->uri->segment(3);
            $data['provinsi'] = $this->Provinsi_model->getAllprovinsi($config['per_page'], $data['start']);
        
            //searching
            if(isset($_POST['submit'])){
            $data['keyword'] = $this->input->post('keyword');
            $data['provinsi'] = $this->Provinsi_model->getProvinsi(ucwords($data['keyword']));
            // set session
            $this->session->set_userdata('keyword',$data['keyword']);
            }
            //if (logged_in()) {
            $this->load->view('provinsi/templates/header', $data);
            $this->load->view('provinsi/index', $data);
            $this->load->view('provinsi/templates/footer');
    }
    
    public function tambah()
        {
            if(isset($_SESSION['username'])){
                $data['judul'] = "Tambah Provinsi";
                $this->load->view('provinsi/templates/header', $data);
                $this->load->view('provinsi/tambah');
                $this->load->view('provinsi/templates/footer');
            }else {
                redirect('auth');
            }
        }

    public function prosesTambahProv()
    {
            $this->Provinsi_model->tambahProvinsi();
            redirect(base_url() . "prov/index");
    }
    
    public function hapus($id)
    {
//        
            $this->Provinsi_model->hapusProvinsi($id);
            redirect(base_url() . "prov/index");
    }
    
    public function update($id)
    {
//        if (logged_in()) {
            $data['judul'] = 'Update Post';
            $data['provinsi'] = $this->Provinsi_model->getProvById($id);

//            $this->form_validation->set_rules('judul', 'Judul Post', 'required');
//            $this->form_validation->set_rules('isi', 'Isi Post', 'required');

//            if ($this->form_validation->run() == FALSE) {
                $this->load->view('provinsi/update', $data);
//            } else {
//                $this->Post_model->updatePost($id);
//                $this->session->set_flashdata('notif', 'diupdate');
//                $this->session->set_flashdata('alert', 'success');
//                $this->session->set_flashdata('tipe', 'berhasil');
//                redirect(base_url() . "post");
//            }
//        } else {
//            redirect('auth');
//        }
    }
    
    public function prosesUpdateProv($id)
    {
        $this->Provinsi_model->updateProvinsi($id);
        redirect(base_url() . "prov/index");
    }
    
//    public function list()
//    {
//            $data['judul'] = "List Provinsi";
//            $data['provinsi'] = $this->Provinsi_model->getAllprovinsi();
//            $this->load->view('provinsi/templates/header', $data);
//            $this->load->view('provinsi/list', $data);
//            $this->load->view('provinsi/templates/footer');
//    }

    public function cari() {
        $query      = $_POST['query'];
        $output     = "";
        $provinsi   = $this->Provinsi_model->getProvinsi($query);

        if($provinsi) {
            foreach ($provinsi as $prov) {
                $output.= '
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <center>
                            
                            <img width="200" height="280" src="'.base_url("upload/provinsi/".$prov["gambar"]).'"/>
                            </center>
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">'.$prov['nama_provinsi'].'</div>
                            
                            <a role="button" href="'.base_url("daerah/index/".$prov['id_provinsi']).'" class="btn btn-primary">Lihat &raquo;</a>
                        </div>
                    </div>
                </div>
                ';
    
            }
        }

        // return $output;
        return $this->output->set_content_type('application/json')
                ->set_output(json_encode($output));
    }

}