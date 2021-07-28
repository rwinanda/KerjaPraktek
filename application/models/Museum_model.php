<?php  
    class Museum_model extends CI_Model
    {
        public function tambahMuseum() 
        {
            $config['upload_path']      = './upload/museum/';
            $config['allowed_types']    = 'jpg|png|gif';
            $config['overwrite']        = true;
            $config['max_size']         = 2048; // 2mb
            
        $this->load->library('upload', $config); // load konfigurasi uploadnya
            
        if($this->upload->do_upload('gambarmuseum'))
            {
            $fileData = $this->upload->data();    
            // jika berhasil :
            $data = array(
            'nama_museum' => $this->input->post('nama_museum'),
            'id_daerah' => $this->input->post('id_daerah'),
            'gambarmuseum' => $fileData['file_name']
          );
            $this->db->insert('museum', $data);
            }
        else 
            {
            // jika gagal :
			 $this->session->set_flashdata('error', $this->upload->display_errors());
            }	  
//            return "default.jpg";
          
        }
        
        public function getAllmuseum()
        {
          return $this->db->select("id_museum,nama_museum,id_daerah, gambarmuseum")->get('museum')->result_array();
        }
        
        public function getMuseumById($id)
        {
        return $this->db
            ->where('id_daerah', $id)
            ->order_by('nama_museum','asc')
            ->get('museum')
            ->result_array();
        }
        
        //untuk update
        public function getMuseumByIdUpdate($id)
        {
        return $this->db
            ->where('id_museum', $id)
            ->order_by('nama_museum','asc')
            ->get('museum')
            ->result_array();
        }
        
        //untuk pagination
        public function getMuseumP($id_daerah, $limit, $offset)
        {
        return $this->db
            ->query( "SELECT * FROM museum
            WHERE id_daerah=$id_daerah
            ORDER BY 
            nama_museum ASC LIMIT
            $limit
            OFFSET $offset"
            )
            ->result_array();
        }
        
        //searching
         public function getMuseum($id_daerah, $keyword = null)
        {
            // return $this->db
            // ->select ("id_daerah,nama_daerah,id_provinsi,logo_daerah,kode_daerah")
            // ->like('nama_daerah', $keyword)
            // ->order_by('nama_daerah','asc')
            // ->get('daerah')
            // ->result_array();

            return $this->db->query(
                "SELECT
                    id_museum,
                    nama_museum,
                    id_daerah,
                    id_admin,
                    gambarmuseum
                FROM 
                    museum
                WHERE 
                    id_daerah = $id_daerah AND
                    nama_museum LIKE '%$keyword%'
                ORDER BY
                    nama_museum ASC"
            )->result_array();
        }
        
        public function updateMuseum($id)
        {
            $config['upload_path']      = './upload/museum/';
            $config['allowed_types']    = 'jpg|png|gif';
            $config['overwrite']        = true;
            $config['max_size']         = 2048; // 2mb
            
        $this->load->library('upload', $config); // load konfigurasi uploadnya
            
        if($this->upload->do_upload('gambarmuseum'))
            {
            $fileData = $this->upload->data();    
            // jika berhasil :
            $data = array(
            'id_museum'   => $this->input->post('id_museum'),
            'nama_museum' => $this->input->post('nama_museum'),
            'gambarmuseum' => $fileData['file_name']
        );
        $this->db
            ->where('id_museum', $id)
            ->update('museum', $data);
            }
        else 
            {
            // jika gagal :
			 $this->session->set_flashdata('error', $this->upload->display_errors());
            }	  
//            return "default.jpg";
        }
        
        public function hapusMuseum($id)
        {
        $this->db
            ->where('id_museum', $id)
            ->delete('museum');
        }

        public function cariMuseum($query)
        {
            return $this->db->query(
                "SELECT
                    *
                FROM
                    museum
                WHERE
                    nama_museum ILIKE '%$query%'"
            )->result_array();
        }
}