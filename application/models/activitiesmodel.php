<?php 
class ActivitiesModel extends CI_Model
{
	public function get_all_activite()
    {
    	$query = $this->db->select("*")->from("activities")->get();
    	return $query->result();
    }

    public function insert_activite($data)
    {
        $this->db->insert('activities',$data);
    }

    public function delete_activite($id)
    {
    	$this->db->delete('activities', array('id' => $id));
    }

    public function this_activite($id)
    {
        $query = $this->db->select("*")->from("activities")->where("id", $id)->get();
        return $query->result();
    }
}
?>