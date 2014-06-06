<?php 
class ElearningModel extends CI_Model
{
	public function get_all_elearning($id)
    {
    	$query = $this->db->select("*")->from("elearning")->where("id", $id)->get();
    	return $query->result();
    }

    public function insert_elearning($data)
    {
        $this->db->insert('elearning',$data);
    }

    public function delete_elearning($id)
    {
    	$this->db->delete('elearning', array('id' => $id));
    }

    public function this_elearning($id)
    {
        $query = $this->db->select("*")->from("elearning")->where("id", $id)->get();
        return $query->result();
    }
}
?>