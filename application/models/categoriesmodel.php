<?php 
class CategoriesModel extends CI_Model
{
	public function get_all_category()
    {
    	$query = $this->db->select("*")->from("categories")->get();
    	return $query->result();
    }

    public function delete_category($id)
    {
    	$this->db->delete('categories', array('id' => $id));
    }
}
?>