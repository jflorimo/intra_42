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

    public function get_activite_from_module_id($id)
    {
        $query = $this->db->select("*")->from("activities")->where("id_modules", $id)->get();
        return $query->result();
    }

    public function inscription_act($idAct)
    {
        $data = array("uid" => $this->session->userdata("uid"), "id_act" => $idAct);
        $this->db->insert('inscrit_act', $data);
    }

    public function desinscription_act($idAct)
    {
        $data = array("uid" => $this->session->userdata("uid"), "id_act" => $idAct);
        $this->db->delete('inscrit_act',$data);
    }

    public function is_iscrit($idAct)
    {
        $query = $this->db->query("select * from inscrit_act where id_act=$idAct and uid='".$this->session->userdata("uid")."'");
        return(count($query->result()));
    }

    public function nb_inscrit($idAct)
    {
        $query = $this->db->query("select * from inscrit_act where id_act=$idAct and uid='".$this->session->userdata("uid")."'");
        return(count($query->result()));
    }
}

?>