<?php  
    class Koleksi_model extends CI_Model
    {
        public function tambahKoleksi() 
        {
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
            'nama_koleksi' => $this->input->post('nama_koleksi'),
            'id_museum' => $this->input->post('id_museum'),
            'gambarkoleksi' => $fileData['file_name']
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
            ->get('koleksi')
            ->result_array();
        }
        
        public function getKoleksiByIdUpdate($id)
        {
        return $this->db
            ->where('id_koleksi', $id)
            ->get('koleksi')
            ->result_array();
        }
        
        //pagination
        public function getMuseumP($id_daerah, $limit, $offset)
        {
        return $this->db
            ->query( "SELECT * FROM museum
            WHERE id_museum=$id_museum
            ORDER BY 
            nama_museum ASC LIMIT
            $limit
            OFFSET $offset"
            )
            ->result_array();
        }
        
        public function updateKoleksi($id)
        {
            $config['upload_path']      = './upload/koleksi/';
            $config['allowed_types']    = 'jpg|png|gif';
            $config['overwrite']        = true;
            $config['max_size']         = 2048; // 2mb
            
        $this->load->library('upload', $config); // load konfigurasi uploadnya
            
        if($this->upload->do_upload('gambarkoleksi'))
        {
        $fileData = $this->upload->data();    
//            jika berhasil :
        $data = array(
            'id_koleksi'   => $this->input->post('id_koleksi'),
            'nama_koleksi' => $this->input->post('nama_koleksi'),
            'gambarkoleksi' => $fileData['file_name']
        );
        $this->db
            ->where('id_koleksi', $id)
            ->update('koleksi', $data);
        }
        else 
            {
            // jika gagal :
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
    }