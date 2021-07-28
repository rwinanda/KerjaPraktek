<?php  
    class Koleksi_model extends CI_Model
    {
        public function tambahKoleksi() 
        {
            //konfigurasi Fitur Upload
            $config['upload_path']      = './upload/koleksi/';
            $config['allowed_types']    = 'jpg|png|gif';
            $config['overwrite']        = true;
            $config['max_size']         = 2048; // 2mb
            
        $this->load->library('upload', $config); // load konfigurasi uploadnya
            
        if($this->upload->do_upload('gambarkoleksi'))
            {
            
            $fileData = $this->upload->data();    
//             jika berhasil :
            $data = array(
            'nama_koleksi'  => $this->input->post('nama_koleksi'),
            'id_museum'     => $this->input->post('id_museum'),
            'gambarkoleksi' => $fileData['file_name'],
            'kel_koleksi'   => $this->input->post('kel_koleksi'),
            'lok_temuan'    => $this->input->post('lok_temuan'),
            'bahan'         => $this->input->post('bahan'),
            'thn_buat'      => $this->input->post('thn_buat'),
            'tanggal'       => $this->input->post('tanggal'),
            'dokum_data'    => $this->input->post('dokum_data'),
            'dokum_foto'   => $this->input->post('dokum_foto'),
            'narasumber'       => $this->input->post('narasumber'),
            'panjang'    => $this->input->post('panjang'),
            'lebar'   => $this->input->post('lebar'),
            'tinggi'       => $this->input->post('tinggi'),
            'tebal'    => $this->input->post('tebal'),
            'diameter'   => $this->input->post('diameter'),
            'fungsi'    => $this->input->post('fungsi'),
            'deskripsi'         => $this->input->post('deskripsi'),
            'sejarah'      => $this->input->post('sejarah'),
            'no_dokum'       => $this->input->post('no_dokum'),
            'lok_simpan'    => $this->input->post('lok_simpan'),
            'referensi'   => $this->input->post('referensi'),
            'lembaga'       => $this->input->post('lembaga'),
            'catatan'       => $this->input->post('catatan')
            );
            $this->db->insert('koleksi', $data);
            }
        else 
            {
//             jika gagal :
			 $this->session->set_flashdata('error', $this->upload->display_errors());
            }	  
            return "default.jpg";
        
        }
        
        public function getAllkoleksi()
        {
          return $this->db->select("id_koleksi,nama_koleksi,id_museum")->get('koleksi')->result_array();
        }
        
        public function getKoleksiById($id)
        {
        return $this->db
            ->where('id_museum', $id)
            ->order_by('nama_koleksi','asc')
            ->get('koleksi')
            ->result_array();
        }
        
        public function getKoleksiByIdUpdate($id)
        {
        return $this->db
            ->where('id_koleksi', $id)
            ->order_by('nama_koleksi','asc')
            ->get('koleksi')
            ->result_array();
        }
        
        //untuk pagination
        public function getKoleksiP($id_museum, $limit, $offset)
        {
        return $this->db
            ->query( "SELECT * FROM koleksi
            WHERE id_museum=$id_museum
            ORDER BY 
            nama_koleksi ASC LIMIT
            $limit
            OFFSET $offset"
            )
            ->result_array();
        }
        
        //Searching didalam index koleksi
        public function getKoleksi($id_museum, $keyword = null)
        {
            // return $this->db
            // ->select ("id_daerah,nama_daerah,id_provinsi,logo_daerah,kode_daerah")
            // ->like('nama_daerah', $keyword)
            // ->order_by('nama_daerah','asc')
            // ->get('daerah')
            // ->result_array();

            return $this->db->query(
                "SELECT
                    *
                FROM 
                    koleksi
                WHERE 
                    id_museum = $id_museum AND
                    nama_koleksi LIKE '%$keyword%'
                ORDER BY
                    nama_koleksi ASC"
            )->result_array();
        }
        
        //searching di halaman utama
        public function getKoleksiByProvinsi($query) {
                return $this->db->query("
                SELECT *
                    
                FROM
                    provinsi
                        
                WHERE
                    provinsi.nama_provinsi ILIKE '%$query%'  
                ")->result_array();
            }
        
        public function updateKoleksi($id)
        {
            //configurasi upload gambar
            $config['upload_path']      = './upload/koleksi/';
            $config['allowed_types']    = 'jpg|png|gif';
            $config['overwrite']        = true;
            $config['max_size']         = 2048; // 2mb
            
        $this->load->library('upload', $config); // load konfigurasi uploadnya
            
        if($this->upload->do_upload('gambarkoleksi'))
        {
        $fileData = $this->upload->data();    
//      jika berhasil :
        $data = array(
            'id_koleksi'   => $this->input->post('id_koleksi'),
            'nama_koleksi' => $this->input->post('nama_koleksi'),
            'gambarkoleksi' => $fileData['file_name'],
            'tanggal'       => $this->input->post('tanggal'),
            'dokum_data'    => $this->input->post('dokum_data'),
            'dokum_foto'   => $this->input->post('dokum_foto'),
            'narasumber'       => $this->input->post('narasumber'),
            'panjang'    => $this->input->post('panjang'),
            'lebar'   => $this->input->post('lebar'),
            'tinggi'       => $this->input->post('tinggi'),
            'tebal'    => $this->input->post('tebal'),
            'diameter'   => $this->input->post('diameter'),
            'fungsi'    => $this->input->post('fungsi'),
            'deskripsi'         => $this->input->post('deskripsi'),
            'sejarah'      => $this->input->post('sejarah'),
            'no_dokum'       => $this->input->post('no_dokum'),
            'lok_simpan'    => $this->input->post('lok_simpan'),
            'referensi'   => $this->input->post('referensi'),
            'lembaga'       => $this->input->post('lembaga'),
            'catatan'       => $this->input->post('catatan')
        );
        $this->db
            ->where('id_koleksi', $id)
            ->update('koleksi', $data);
        }
        else 
            {
//             jika gagal :
			 $this->session->set_flashdata('error', $this->upload->display_errors());
            }	  
//            return "default.jpg";
        }
        
        public function hapusKoleksi($id)
        {
        $this->db
            ->where('id_koleksi', $id)
            ->delete('koleksi');
        }
        
//        public function prosesMpdf()
//        {
//           
//            
//        }
    }