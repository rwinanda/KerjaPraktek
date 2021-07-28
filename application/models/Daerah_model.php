<?php  
    class Daerah_model extends CI_Model
    {
        //fitur tambah
        public function tambahDaerah() 
        {
            $config['upload_path']      = './upload/daerah/';
            $config['allowed_types']    = 'jpg|png|gif';
            $config['overwrite']        = true;
            $config['max_size']         = 2048; // 2mb
            
        $this->load->library('upload', $config); // load konfigurasi uploadnya
            
        if($this->upload->do_upload('gambardaerah'))
            {
            
            $fileData = $this->upload->data();    
            // jika berhasil :
            $data = array(
            'nama_daerah' => $this->input->post('nama_daerah'),
            'id_provinsi' => $this->input->post('id_provinsi'),
            'gambardaerah' => $fileData['file_name']
//           $file = $this->upload->data();
////         $gambar = $file['file_name'];
////         'gambar' => $this->input->post('gambar')
            );
            $this->db->insert('daerah', $data);
            }
        else 
            {
            // jika gagal :
			 $this->session->set_flashdata('error', $this->upload->display_errors());
            }	  
//            return "default.jpg";
        
        }
        
        public function getAlldaerah()
        {
          return $this->db->select("id_daerah,nama_daerah,id_provinsi,gambardaerah")->get('daerah')->result_array();
        }
        
        public function getDaerahById($id)
        {
        return $this->db
            ->where('id_provinsi', $id)
            ->order_by('nama_daerah','asc')
            ->get('daerah')
            ->result_array();
        }
        
        //fitur id untuk update
        public function getDaerahByIdUpdate($id)
        {
        return $this->db
            ->where('id_daerah', $id)
            ->order_by('nama_daerah','asc')
            ->get('daerah')
            ->result_array();
        }
        
        //        public function countAllDaerah($id)
        //         {
        //            return $this->db->where('id_provinsi', $id)->get('daerah')->num_rows(); 
        //         }
        
        //pagination
        public function getDaerahP($id_provinsi, $limit, $offset)
        {
        return $this->db
            ->query( "SELECT * FROM daerah
            WHERE id_provinsi=$id_provinsi
            ORDER BY 
            nama_daerah ASC LIMIT
            $limit
            OFFSET $offset"
            )
            ->result_array();
        }
        
        //searching
         public function getDaerah($id_provinsi, $keyword = null)
        {
            // return $this->db
            // ->select ("id_daerah,nama_daerah,id_provinsi,logo_daerah,kode_daerah")
            // ->like('nama_daerah', $keyword)
            // ->order_by('nama_daerah','asc')
            // ->get('daerah')
            // ->result_array();

            return $this->db->query(
                "SELECT
                    id_daerah,
                    nama_daerah,
                    id_provinsi,
                    gambardaerah
                FROM 
                    daerah
                WHERE 
                    id_provinsi = $id_provinsi AND
                    nama_daerah LIKE '%$keyword%'
                ORDER BY
                    nama_daerah ASC"
            )->result_array();
        }
        
        public function countAllDaerah()
         {
            return $this->db->get('daerah')->num_rows(); 
         }
        
        //fitur konfigurasi untuk update
        public function updateDaerah($id)
        {
            $config['upload_path']      = './upload/daerah/';
            $config['allowed_types']    = 'jpg|png|gif';
            $config['overwrite']        = true;
            $config['max_size']         = 2048; // 2mb
            
        $this->load->library('upload', $config); // load konfigurasi uploadnya
            
        if($this->upload->do_upload('gambardaerah'))
            {
            $fileData = $this->upload->data();    
            // jika berhasil :
            $data = array(
            'id_daerah'   => $this->input->post('id_daerah'),
            'nama_daerah' => $this->input->post('nama_daerah'),
            'gambardaerah' => $fileData['file_name']
        );
        $this->db
            ->where('id_daerah', $id)
            ->update('daerah', $data);
            }
        else 
            {
            // jika gagal :
			 $this->session->set_flashdata('error', $this->upload->display_errors());
            }	  
//            return "default.jpg";
        }
        
        public function hapusDaerah($id)
        {
        $this->db
            ->where('id_daerah', $id)
            ->delete('daerah');
        }
    }