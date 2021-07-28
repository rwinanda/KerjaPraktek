<?php
 
class Auth_model extends CI_Model
{
 
    public function cek_login($username)
    {
 
        $hasil = $this->db->where('username', $username)->limit(1)->get('admin');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return array();
        }
    }
 
    public function register($table, $data)
    {
        return $this->db->insert($table, $data);
    }
}
?>