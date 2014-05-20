<?php 
class AdminsModel extends CI_Model
{
    public function is_admin($uid)
    {
        $query = $this->db->select('*')->from("admins")->where("uid", $uid)->get();
        if ($query->num_rows() > 0)
        	return true;
        else
        	return false;
    }

    public function get_all_admin()
    {
    	$query = $this->db->select("*")->from("admins")->get();
    	return $query->result();
    }

    public function insert_admin($data)
    {
        $this->db->insert('admins',$data);
    }

    public function delete_admin($id)
    {
    	$this->db->delete('admins', array('id' => $id));
    }
}
?>