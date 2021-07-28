<?php

class koleksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Koleksi_model');
        $this->load->model('Museum_model');
        // $config['base_url'] = 'http://localhost/museumkp/koleksi/index';
        
    }
    
    public function index($id_museum, $hal=null)
    {
            $data['judul'] = 'Halaman Koleksi';
            //pagination
            $data['koleksi'] = $this->Koleksi_model->getKoleksiById($id_museum);
            $data['id_museum'] = $id_museum;
            $this->load->library('pagination');
            $data["data_perhalaman"]=3;
            $data["halaman"] = isset($hal) ?$hal : 1;
            $data["halaman_awal"] = $data["halaman"] > 1 ?
            $data["data_perhalaman"]*$data["halaman"]-$data["data_perhalaman"] : 0;
        
            $data["sebelumnya"] = $data["halaman"] - 1;
            $data["berikutnya"] = $data["halaman"] + 1;
        
            $data["jumlah_data"] = count($this->Koleksi_model->getKoleksiById($id_museum));
            $data['total_halaman'] = ceil($data["jumlah_data"]/$data["data_perhalaman"]);
            
            //Jika Pagination sukses berarti LIMIT OFFSET BENAR
            $data['koleksi'] = $this->Koleksi_model->getKoleksiP($id_museum, $data['data_perhalaman'], $data['halaman_awal']);
        
            //searching
            if(isset($_POST['submit'])){
            $data['keyword'] = $this->input->post('keyword');
            $data['koleksi'] = $this->Koleksi_model->getKoleksi($id_museum, ucwords($data['keyword']));
            // set session searching
            $this->session->set_userdata('keyword',$data['keyword']);
            }
        
            //membuat deklarasi untuk membaca model dari museum
            $test = $this->Museum_model->getMuseumByIdUpdate($id_museum); 
            //menampilkan data dari nama museum
            $data['nama_museum'] = $test[0]["nama_museum"]; 
            $this->load->view('koleksi/templates/header', $data);
            $this->load->view('koleksi/index', $data);
            $this->load->view('koleksi/templates/footer');
    }
    
    public function indexkoleksi($id)
    {
         $data['judul'] = 'Halaman Detail Koleksi';
         $data['koleksi'] = $this->Koleksi_model->getKoleksiByIdUpdate($id);
         $data['id_koleksi'] = $id;
         $this->load->view('koleksi/templates/header', $data);
         $this->load->view('koleksi/indexkoleksi', $data);
         $this->load->view('koleksi/templates/footer');
    }
    
    public function tambah($id)
        {
//            if(logged_in()){
                $data['judul'] = "Tambah Koleksi";
                $data['id']    = $id;
                $data['id_museum'] = $id;
                $this->load->view('koleksi/tambah', $data);
            }
//            else {
//                redirect('auth');
//            }
        
    public function prosesTambahKoleksi($id)
        {
            $this->Koleksi_model->tambahKoleksi();
            redirect(base_url() . "koleksi/index/".$id);    
        }
    
    public function update($id)
        {
            $data['judul'] = 'Update Koleksi';
            $data['koleksi'] = $this->Koleksi_model->getKoleksiByIdUpdate($id);
            $data['id'] = $id;
            $this->load->view('koleksi/update', $data);
        }
    
    public function prosesUpdateKoleksi($id,$id_museum)
        {
        $this->Koleksi_model->updateKoleksi($id);
        redirect(base_url() . "koleksi/index/".$id_museum);
        }
    
    public function hapus($id, $id_koleksi)
        {        
            $this->Koleksi_model->hapusKoleksi($id);
            redirect(base_url() . "koleksi/index/".$id_koleksi);
        }
    
    //export pdf
    public function mpdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Hello World');
        $mpdf->Output();
    }
    
    // CARI OBJEK 
    // BERDASARKAN PROVINSI
    public function cariKoleksi()
    {
        $data['judul']   = "Hasil Cari";
        $query           = $this->input->post('query');

        $data['koleksi']   = $this->Koleksi_model->getKoleksiByProvinsi($query);
        
        echo '<pre>';
        var_dump($data['koleksi']);
        echo '</pre>';
        die;
        $data['query']   = $this->input->post('query');

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

}
