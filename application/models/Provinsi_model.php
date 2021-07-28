<?php  
    class Provinsi_model extends CI_Model
    {
        public function tambahProvinsi() 
        {
            $config['upload_path']      = './upload/provinsi/';
            $config['allowed_types']    = 'jpg|png|gif';
            $config['overwrite']        = true;
            $config['max_size']         = 2048; // 2mb
            
        $this->load->library('upload', $config); // load konfigurasi uploadnya
            
        if($this->upload->do_upload('gambar'))
            {
            
                $fileData = $this->upload->data();    
                // jika berhasil :
                $data = array(
                 'nama_provinsi' => $this->input->post('nama_provinsi'),
                 'gambar' => $fileData['file_name']
    //           $file = $this->upload->data();
    ////         $gambar = $file['file_name'];
    ////         'gambar' => $this->input->post('gambar')
            );
            $this->db->insert('provinsi', $data);
            }
        else 
            {
                // jika gagal :
                 $this->session->set_flashdata('error', $this->upload->display_errors());
            }	  
//            return "default.jpg"; 
        }
        
        public function getAllprovinsi($limit, $start)
        {
          return $this->db
              ->select("id_provinsi,nama_provinsi,gambar")
              ->get('provinsi', $limit, $start)
              ->result_array();
        }
        
        //untuk membaca database
        public function getProvById($id)
        {
        return $this->db
            ->select("id_provinsi, nama_provinsi, gambar")
            ->where('id_provinsi', $id)
            ->get('provinsi')
            ->result_array();
        }
        
        //untuk searching
        public function getProvinsi($keyword = null)
        {
            return $this->db->query(
                "SELECT
                    id_provinsi,
                    nama_provinsi,
                    gambar
                FROM
                    provinsi
                WHERE
                    nama_provinsi ILIKE '%$keyword%'
                ORDER BY
                    nama_provinsi ASC"
            )->result_array();
        }
        
        public function hapusProvinsi($id)
        {
        $this->db
            ->where('id_provinsi', $id)
            ->delete('provinsi');
        }
        
        public function updateProvinsi($id)
        {
           
            $config['upload_path']      = './upload/provinsi/';
            $config['allowed_types']    = 'jpg|png|gif';
            $config['overwrite']        = true;
            $config['max_size']         = 2048; // 2mb
            
        $this->load->library('upload', $config); // load konfigurasi uploadnya
            
        if($this->upload->do_upload('gambar'))
            {
            
            $fileData = $this->upload->data();    
            // jika berhasil :
            $data = array(
             'id_provinsi'   => $this->input->post('id_provinsi'),
             'nama_provinsi' => $this->input->post('nama_provinsi'),
             'gambar' => $fileData['file_name']
//           $file = $this->upload->data();
////         $gambar = $file['file_name'];
////         'gambar' => $this->input->post('gambar')
            );
            $this->db
            ->where('id_provinsi', $id)
            ->update('provinsi', $data);
            }
            else 
            {
            // jika gagal :
			 $this->session->set_flashdata('error', $this->upload->display_errors());
            }	  
            return "default.jpg";
        }   
        
//        public function getProvinsi($limit, $start)
//        {
//            return $this->db
//            ->select("id_provinsi, nama_provinsi, gambar")
//            ->where('id_provinsi')
//            ->get('provinsi', $limit, $start)
//            ->result_array();
//        }
        
        public function countAllProv()
         {
            return $this->db->get('provinsi')->num_rows(); 
         }
}
