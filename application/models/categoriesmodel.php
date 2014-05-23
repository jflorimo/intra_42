<?php 
class CategoriesModel extends CI_Model
{
	public function get_all_category()
    {
    	$query = $this->db->select("*")->from("categories")->get();
    	return $query->result();
    }

    public function get_all_category_orderby_type()
    {
    	$query = $this->db->select("*")->from("categories")->order_by("type")->get();
    	return $query->result();
    }

    //     function edit_categories($data, $id)
    // {
    //     $this->db->where("id", $id);
    //     $this->db->update("categories",$data);
    // }

    // function delete_categories($id)
    // {
    //     $this->db->delete('categories', array('id' => $id));
    // }


    public function insert_category($data)
    {
        $this->db->insert('categories',$data);
    }

    public function delete_category($id)
    {
    	$this->db->delete('categories', array('id' => $id));
    }

    public function this_category($id)
    {
        $query = $this->db->select("*")->from("categories")->where("id", $id)->get();
        return $query->result();
    }
}
?>