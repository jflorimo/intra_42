<?php 
class SouscategoriesModel extends CI_Model
{
	public function get_all_souscategory()
    {
    	$query = $this->db->select("souscategories.*, categories.name AS cname")
    					->from("souscategories")
    					->join('categories', 'souscategories.id_categories = categories.id', 'inner')
    					->get();
    	return $query->result();
    }

    public function insert_souscategory($data)
    {
        $this->db->insert('souscategories',$data);
    }

    public function delete_souscategory($id)
    {
    	$this->db->delete('souscategories', array('id' => $id));
    }

    public function this_souscategory($id)
    {
        $query = $this->db->select("*")->from("souscategories")->where("id", $id)->get();
        return $query->result();
    }
}
?>