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
}
?>