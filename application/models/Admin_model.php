<?php

class Admin_model extends CI_Model
{
    public function register()
    {
        $data = [
            'username' => $this->input->post('username', true),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'id_role' => $this->input->post('id_role', true),
            ];
        $this->db->insert('admin', $data);
    }
    
    public function getUserByUsername($username)
    {
        return $this->db->get_where('admin', ['username' => $username])->row_array();
    }
    
    public function createVerification($data)
    {
        $this->db->insert('verification', $data);
    }
    
    public function getUserToken($username)
    {
        return $this->db->get_where('verification', ['username' => $username])->row_array();
    }
    
    public function deleteUser($username)
    {
        $this->db->delete('admin', ['username' => $username]);
    }
    
    public function login($username, $password)
    {
        return $this->db->get_where('admin', [
            'username' => $username,
            'password' => $password
        ])->row_array();
    }
}
