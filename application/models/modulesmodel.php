<?php 
class ModulesModel extends CI_Model
{
	public function get_all_module()
    {
         $query = $this->db->select("modules.*, semestres.titre")
                        ->from("modules")
                        ->join('semestres', 'modules.id_semestres = semestres.id', 'inner')
                        ->get();
    	return $query->result();
    }

    public function insert_module($data)
    {
        $this->db->insert('modules',$data);
    }

    public function delete_module($id)
    {
    	$this->db->delete('modules', array('id' => $id));
    }

    public function this_module($id)
    {
		$query = $this->db->select("*")->from("modules")->where("id", $id)->get();
		return $query->result();
    }

    public function is_iscrit($idModule)
    {
		$query = $this->db->query("select * from inscrit where id_module=$idModule and uid='".$this->session->userdata("uid")."'");
		return(count($query->result()));
    }

    public function inscription_module($idModule)
    {
    	$data = array("uid" => $this->session->userdata("uid"), "id_module" => $idModule);
    	$this->db->insert('inscrit', $data);
    }

    public function desinscription_module($idModule)
    {
		$data = array("uid" => $this->session->userdata("uid"), "id_module" => $idModule);
		$this->db->delete('inscrit',$data);
    }
}
?>