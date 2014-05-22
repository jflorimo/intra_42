<?php 
class SouscategoriesModel extends CI_Model
{
	public function get_all_souscategory()
    {
    	$query = $this->db->select("*")->from("souscategories")->get();
    	return $query->result();
    }
}
?>