
<?php 
class AnswerthreadsModel extends CI_Model
{
	function insert_answer($data)
	{
		$this->db->insert("answer_threads", $data);
	}

	function answers_by_thread($id_thread)
	{
		$query = $this->db->select("*")->from("answer_threads")->where("id_threads", $id_thread)->get();
		return $query->result();
	}

	function this_answer($id)
	{
		$query = $this->db->select("*")->from("answer_threads")->where("id", $id)->get();
		return $query->result();
	}
}
?>