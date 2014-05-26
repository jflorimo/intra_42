
<?php 
class ThreadsModel extends CI_Model
{
	public function insert_thread($data)
	{
		$this->db->insert("threads", $data);
	}

	public function threads_by_category($id_category)
	{
		$query = $this->db->select("*")->from("threads")->where("id_categories", $id_category)->get();
		return $query->result();
	}

	public function threads_by_souscategory($id_souscategory)
	{
		$query = $this->db->select("*")->from("threads")->where("id_souscategories", $id_souscategory)->get();
		return $query->result();
	}

	public function this_thread($id)
	{
		$query = $this->db->select("*")->from("threads")->where("id", $id)->get();
		return $query->result();
	}
}
?>