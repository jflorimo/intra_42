<?php 
class SemestresModel extends CI_Model
{
	public function get_all_semestre()
    {
    	$query = $this->db->select("*")->from("semestres")->get();
    	return $query->result();
    }

    public function insert_semestre($data)
    {
        $this->db->insert('semestres',$data);
    }

    public function delete_semestre($id)
    {
    	$this->db->delete('semestres', array('id' => $id));
    }

    public function this_semestre($id)
    {
        $query = $this->db->select("*")->from("semestres")->where("id", $id)->get();
        return $query->result();
    }
}
?>