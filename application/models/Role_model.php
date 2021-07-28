<?php
 
class Role_model extends CI_model
{
    public function get($table)
    {
        $result = $this->db->get($table);
        return $result;
    }
}
?>
