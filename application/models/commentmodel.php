<?php 
class CommentModel extends CI_Model
{

    function insert_comment($data)
    {
        $this->db->insert("comment_answer", $data);
    }

    function comments_by_answer($id_answer)
    {
        $query = $this->db->select("*")->from("comment_answer")->where("id_answer_threads", $id_answer)->get();
        return $query->result();
    }
}
?>